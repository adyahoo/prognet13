<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\Transaction_Detail;
use App\Product;
use App\Courier;
use App\Product_Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
        $couriers = Courier::all();
        return view('products.shopdetail', ['product' => $product,'courier' => $couriers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // dd($request->all());
        
        $total = $request->price * $request->qty;
        $sub_total = $total + '10000';
        $id_user = Auth::guard('user')->id();
        Transaction::create([
            'address' => $request->address,
            'user_id' => $id_user,
            'regency' => $request->regency,
            'province' => $request->province,
            'total' => $total,
            'shipping_cost' => '10000',
            'sub_total' => $sub_total,
            'courier_id' => $request->courier,
            'status' => 'unverified'
        ]);
        $transaction = Transaction::where('user_id',$id_user)->get();
        foreach ($transaction as $transactions) {
            $transaction_id = $transactions->id;
        }
        Transaction_Detail::create([
            'transaction_id' => $transaction_id,
            'product_id' => $request->id_product,
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
        //
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
        $transaction_details = Transaction_Detail::with('Transaction')->get();
        return view('user.pesananuser', compact('transactions','products','transaction_details', 'id_user'));
    }


    public function updateKonf(Request $request)
    {
        $name_user = Auth::guard('user')->user()->name;
        Transaction::where('id', $request->id_transaksi)
                ->update([
                    'proof_of_payment' => $request->proof_of_payment,
                    'status' => 'verified'
                ]);

        $file = $request->file('proof_of_payment');
        // echo $berkas;
        // echo $berkas->getClientOriginalName();
        $path = 'fresh/images/proof';
        $name_file = $name_user."_".time()."_".$file->getClientOriginalName();
        // echo $name_file;

        // //proses upload ke storage larapel
        $file->move($path,$name_file);
        return redirect('/pesananuser');
    }
}
