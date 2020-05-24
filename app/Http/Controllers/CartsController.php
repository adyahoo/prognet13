<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use App\Courier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id_user = Auth::guard('user')->id();
        $products = Product::with('Cart')->get();
        $carts = Cart::where('user_id',$id_user)->get();
        $couriers = Courier::all();
        return view('user.cartuser', compact('carts','products', 'id_user','couriers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_user = Auth::guard('user')->id();
        Cart::create([
            'user_id' => $id_user,
            'product_id' => $request->id_product,
            'qty' => $request->qty,
            'status' => 'notyet'
        ]);
        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }

    public function carttrans(Request $request)
    {
        dd($request->all());
    }
}
