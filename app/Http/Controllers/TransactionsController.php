<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Transaction;
use App\Transaction_Detail;
use App\Product;
use App\Courier;
use App\Product_Image;
use App\Product_Review;
use App\Cart;
use App\City;
use App\Province;
use App\Admin;
use App\Notifications\NewTransaction;
use App\Notifications\UploadProof;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $all_images = Product_Image::with('Product')->get();
        return view('products.shop', compact('all_images','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $product = \App\Product::find($id);
        $all_review = Product_Review::with('Product')->get()->where('product_id',$id);
        $couriers = Courier::all();
        $provinces = Province::all();
        if(auth()){
            $userName = Auth::guard('user')->user();
        }else{
            $userName = "";
        }
        // echo $userName;
        return view('products.shopdetail', ['product' => $product,'courier' => $couriers, 'all_review'=> $all_review, 'userName' => $userName, 'provinces'=>$provinces]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // dd($request)->all();
        $origin = 114;
        $destination =$request->destination;
        $weight = 1000;
        $courier_id = $request->courier;
        $courier_name = Courier::where('id',$courier_id)->first('courier');
        $province_name = Province::where('id',$request->province_to)->first('province');
        $regency_name = City::where('id',$destination)->first('city_name');

        $ongkir = Http::asForm()->withHeaders([
            'key'=>'f9941f3ab651b045b7b3c32e83edc255'
        ])->post('https://api.rajaongkir.com/starter/cost',[
            'origin'=> $origin,
            'destination'=> $destination,
            'weight'=> $weight,
            'courier'=> $courier_name->courier
        ]);
        $cekongkir = $ongkir['rajaongkir']['results'][0]['costs'];
        
        foreach ($cekongkir as $hasil) {
            $kirim=$hasil['cost'][0]['value'];
        };

        $total = $request->price * $request->qty;
        $sub_total = $total + $kirim;
        $id_user = Auth::guard('user')->id();
        $date = Carbon::now('Asia/Makassar');
        $timeout = $date->addHours(24);
        // echo $date;
        $transaksi = Transaction::create([
            'address' => $request->address,
            'user_id' => $id_user,
            'regency' => $regency_name->city_name,
            'province' => $province_name->province,
            'total' => $total,
            'shipping_cost' => $kirim,
            'sub_total' => $sub_total,
            'courier_id' => $courier_id,
            'timeout' => $timeout,
            'status' => 'unverified'
        ]);

        $transaksi_id = $transaksi->id;
        // echo $transaksi_id;
        // $transaction = Transaction::where('user_id',$id_user)->get();
        // foreach ($transaction as $transactions) {
        //     $transaction_id = $transactions->id;
        // }
        Transaction_Detail::create([
            'transaction_id' => $transaksi_id,
            'product_id' => $request->product_id,
            'qty' => $request->qty,
            'selling_price' => $request->price
        ]);

        $admins = Admin::all();
        foreach ($admins as $admin) {
            $admin->notify(new NewTransaction());
        }

        return redirect('/pesananuser');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction_id = $transaction->id;
        // dd($transaction_id);
        $transDetail = Transaction_Detail::where('transaction_id',$transaction_id)->get();
        // echo $transDetail->id;
        foreach ($transDetail as $detail) {
            // echo($detail->id);
            Transaction_Detail::destroy($detail->id);
        }

        Transaction::destroy($transaction_id);
        // Transaction::where('id', $transaction_id)
        //         ->update([
        //             'status' => 'canceled'
        //         ]);

        return redirect('/pesananuser');
    }

    public function pesananUser()
    {
        $id_user = Auth::guard('user')->id();
        $products = Product::with('Transaction_Detail')->get();
        $status = 'unverified';
        // $transactions = Transaction::table('transactions')
        // ->where('user_id', $id_user)
        // ->Where('status', 'unverified')
        // ->get();
        $transactions = Transaction::where('user_id',$id_user)->get();
        $transaction_details = Transaction_Detail::with('Transaction','Product')->get();
        // dd($transaction_details);
        return view('user.pesananuser', compact('transactions','products','transaction_details', 'id_user'));
    }


    public function updateKonf(Request $request)
    {
        // dd($request);
        $name_user = Auth::guard('user')->user()->name;
        $id_user = Auth::guard('user')->id();
        $file = $request->file('proof');
        // echo $file;
        // echo $berkas->getClientOriginalName();
        $path = 'fresh/images/proof';
        $name_file = $name_user."_".time()."_".$file->getClientOriginalName();
        // echo $name_file;
        Transaction::where('id', $request->id_transaksi)
                ->update([
                    'proof_of_payment' => $name_file,
                    'status' => 'success'
                ]);
        Cart::where('user_id',$id_user)->update([
                'status' => 'checkedout'
            ]);
        // //proses upload ke storage larapel
        $file->move($path,$name_file);

        $admins = Admin::all();
        foreach ($admins as $admin) {
            $admin->notify(new UploadProof());
        }

        return redirect('/pesananuser');
    }

    public function getCityAjax($id){
        $cities = City::where('province_id',$id)->pluck('city_name','id');
        // dd($cities);
        return json_encode($cities);
    }

    public function updateExpired($id){
        Transaction::where('id',$id)->update([
            'status' => 'expired'
        ]);
        return redirect('/pesananuser');
    }

    public function getBulan(Request $request){
        // dd($request);

        $transaksi = Transaction::whereMonth('created_at','=', $request->bulan)->whereYear('created_at','=', $request->tahun)->get();
        $status = ['unverified' => 0,'expired' => 0, 'cancelled' => 0, 'verified' => 0, 'success' => 0, 'harga' => 0, 'total' => $transaksi->count()];
        $status['unverified'] = $this->findCountStatus('unverified',$request->bulan,$request->tahun,1);
        $status['expired'] = $this->findCountStatus('expired',$request->bulan,$request->tahun,1);
        $status['cancelled'] = $this->findCountStatus('cancelled',$request->bulan,$request->tahun,1);
        $status['verified'] = $this->findCountStatus('verified',$request->bulan,$request->tahun,1);
        $status['success'] = $this->findCountStatus('success',$request->bulan,$request->tahun,1);

        foreach($transaksi as $item){
            if($item->status == 'verified' || $item->status == 'success'){
                $status['harga'] = $status['harga'] + $item->total;
            }
        }

        return response()->json(['success' => 'berhasil', 'data' => $status]);
    }

    public function getTahun(Request $request){
        // dd($request);

        $transaksi = Transaction::whereMonth('created_at','=', $request->bulan)->whereYear('created_at','=', $request->tahun)->get();
        $status = ['unverified' => 0,'expired' => 0, 'cancelled' => 0, 'verified' => 0, 'success' => 0, 'harga' => 0, 'total' => $transaksi->count()];
        $status['unverified'] = $this->findCountStatus('unverified',$request->bulan,$request->tahun,1);
        $status['expired'] = $this->findCountStatus('expired',$request->bulan,$request->tahun,1);
        $status['cancelled'] = $this->findCountStatus('cancelled',$request->bulan,$request->tahun,1);
        $status['verified'] = $this->findCountStatus('verified',$request->bulan,$request->tahun,1);
        $status['success'] = $this->findCountStatus('success',$request->bulan,$request->tahun,1);

        foreach($transaksi as $item){
            if($item->status == 'verified' || $item->status == 'success'){
                $status['harga'] = $status['harga'] + $item->total;
            }
        }

        $transaksi_tahun = Transaction::whereYear('created_at','=', $request->tahun)->get();
        $status_tahun = ['unverified' => 0,'expired' => 0, 'cancelled' => 0, 'verified' => 0, 'success' => 0, 'harga' => 0, 'total' => $transaksi->count()];
        $status_tahun['unverified'] = $this->findCountStatus('unverified',$request->bulan,$request->tahun,2);
        $status_tahun['expired'] = $this->findCountStatus('expired',$request->bulan,$request->tahun,2);
        $status_tahun['cancelled'] = $this->findCountStatus('cancelled',$request->bulan,$request->tahun,2);
        $status_tahun['verified'] = $this->findCountStatus('verified',$request->bulan,$request->tahun,2);
        $status_tahun['success'] = $this->findCountStatus('success',$request->bulan,$request->tahun,2);

        foreach($transaksi_tahun as $item){
            if($item->status_tahun == 'verified' || $item->status_tahun == 'success'){
                $status_tahun['harga'] = $status_tahun['harga'] + $item->total;
            }
        }

        return response()->json(['success' => 'berhasil', 'data_bulan'=>$status, 'data_tahun' => $status_tahun]);
    }

    public function grafik(Request $request){
        if($request->status == 'all'){
            for($i = 1;$i<=12;$i++){
                $grafik[$i] = Transaction::whereMonth('created_at','=', $i)->whereYear('created_at','=', $request->tahun)->count();
            }
        }else{
            for($i = 1;$i<=12;$i++){
                $grafik[$i] = Transaction::whereMonth('created_at','=', $i)->whereYear('created_at','=', $request->tahun)->where('status', '=', $request->status)->count();
            }
        }   
        return response()->json(['success' => 'berhasil', 'grafik' => $grafik]);
    }

    public function findCountStatus($status, $bulan, $tahun, $cek)
    {
        if($cek == 1){
            $count = Transaction::whereMonth('created_at','=', $bulan)->whereYear('created_at','=', $tahun)->where('status',$status)->count();
        }else{
            $count = Transaction::whereYear('created_at','=', $tahun)->where('status',$status)->count();
        }
        return $count;
    }

}
