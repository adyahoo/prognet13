<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\Transaction_Detail;
use App\Product;
use App\Courier;
use App\Product_Image;
use App\Product_Review;
use App\Cart;
use App\City;
use App\Province;
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
        $userName = Auth::guard('user')->user()->name;
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
        $transaksi = Transaction::create([
            'address' => $request->address,
            'user_id' => $id_user,
            'regency' => $regency_name->city_name,
            'province' => $province_name->province,
            'total' => $total,
            'shipping_cost' => $kirim,
            'sub_total' => $sub_total,
            'courier_id' => $courier_id,
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
        return redirect('/pesananuser');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        $transaction_id = $transaction->id;
        // dd($transaction_id);
        $transDetail = Transaction_Detail::where('transaction_id',$transaction_id)->first('id');
        // echo $transDetail->id;
        Transaction_Detail::destroy($transDetail->id);
        Transaction::destroy($transaction_id);
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
        $name_user = Auth::guard('user')->user()->name;
        $id_user = Auth::guard('user')->id();
        $file = $request->file('proof_of_payment');
        // echo $berkas;
        // echo $berkas->getClientOriginalName();
        $path = 'fresh/images/proof';
        $name_file = $name_user."_".time()."_".$file->getClientOriginalName();
        // echo $name_file;
        Transaction::where('id', $request->id_transaksi)
                ->update([
                    'proof_of_payment' => $name_file,
                    'status' => 'verified'
                ]);
        Cart::where('user_id',$id_user)->update([
                'status' => 'checkedout'
            ]);
        // //proses upload ke storage larapel
        $file->move($path,$name_file);
        return redirect('/pesananuser');
    }

    public function getCityAjax($id){
        $cities = City::where('province_id',$id)->pluck('city_name','id');
        // dd($cities);
        return json_encode($cities);
    }
}
