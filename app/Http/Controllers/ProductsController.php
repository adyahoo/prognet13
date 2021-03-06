<?php

namespace App\Http\Controllers;

use App\Product;
use App\Courier;
use App\Product_Review;
use App\Product_Image;
use Illuminate\Http\Request;

class ProductsController extends Controller
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
    public function create(Product $product)
    {
        // return $product;
        $couriers = Courier::all();
        return view('products.shopdetail', compact('product', 'couriers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //fiqr
        $all_review = Product_Review::with('Product')->get();
        $product = \App\Product::find($id);
        echo $product;  
        // return view('products.shopdetail', ['product' => $product]);
        // return view('products.shopdetail',compact('product','all_review'))

        // $product = Product::with('Product_Image')->get();
        // // echo $product;
        // return view('products.shopdetail', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
