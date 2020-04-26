<?php

namespace App\Http\Controllers;

use Hash;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ListProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.listproduct', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.buatproduct', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'stock' => 'required|numeric',
            'weight' => 'required|numeric',
            // 'image_name' => 'required',
            // 'category' => 'required',
        ]);
        

        // $file = $request->file('image_name');
        // $path = 'public/fresh/images';
        // $name_file = $file->getClientOriginalName()."_".$request->name."_".time();

        // //proses upload ke storage larapel
        // $file->move($path,$name_file);

        Product::create([
            'product_name' => $request->product_name,
            'price' => $request->price,
            'description' => $request->description,
            'stock' => $request->stock,
            'weight' => $request->weight
        ]);
        // Product_image::create([
        //     'image_name' => $request->image_name,
        // ]);
        
        // Category_Detail::create([
        //     'category_id' => $request->category->id,
        //     'product_id' => $request->product->id,
        // ]);


        return redirect('/buatproduct')->with('status', 'Data Product Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.shopdetail', compact('product', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.editproduct', compact('product'));
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
        Product::where('id', $product->id)
                ->update([
                    'product_name' => $request->product_name,
                    'price' => $request->price,
                    'description' => $request->description,
                    'stock' => $request->stock,
                    'weight' => $request->weight
                ]);
        return redirect('/listproduct')->with('status', 'Data Product Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Product::destroy($product->id);
        return redirect('/listproduct')->with('status', 'Data Product Berhasil Dihapus!');
    }
}
