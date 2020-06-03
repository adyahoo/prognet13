<?php

namespace App\Http\Controllers;

use Hash;
use App\Category;
use App\Product;
use App\Product_Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Facades\File;


class ListProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
        $prod_images = Product_Image::get();
        return view('admin.listproduct', compact('products'));
        // echo $products;
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
            'image_name' => 'required',
            // 'category' => 'required',
        ]);
        
        $file = $request->file('image_name');
        // echo $berkas;
        // echo $berkas->getClientOriginalName();
        $path = 'fresh/images';
        $name_file = $request->product_name."_".time()."_".$file->getClientOriginalName();
        // echo $name_file;

        // //proses upload ke storage larapel
        $file->move($path,$name_file);

        Product::create([
            'id' => $request->id,
            'product_name' => $request->product_name,
            'price' => $request->price,
            'description' => $request->description,
            'stock' => $request->stock,
            'weight' => $request->weight
        ]);


        $product = Product::where('product_name',$request->product_name)->get();
        // echo $product;
        foreach ($product as $products) {
            $product_id = $products->id;
        }
        // // echo $product_id;
        $image = new Product_image;
        $image->product_id = $product_id;
        $image->image_name = $name_file;
        $image->save();
        // echo "sukses";

        // Product_image::create([
        //     'image_name' => $request->image_name,
        // ]);
        
        // Category_Detail::create([
        //     'category_id' => $request->category->id,
        //     'product_id' => $request->product->id,
        // ]);


        return redirect('/listproduct')->with('status', 'Data Product Berhasil Ditambahkan!');
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

        $file = $request->file('image_name');
        // echo $berkas;
        // echo $berkas->getClientOriginalName();
        $path = 'fresh/images';
        $name_file = $request->product_name."_".time()."_".$file->getClientOriginalName();
        // echo $name_file;

        // //proses upload ke storage larapel
        $file->move($path,$name_file);

        $product_id = $request->id;
        // echo $product_id;
        Product_image::where('product_id',$request->id)
            ->update([
                'product_id' => $request->id,
                'image_name' => $name_file
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
        $image_id = Product_Image::where('product_id',$product->id)->first();
        Product_Image::destroy($image_id->id);
        Product::destroy($product->id);
        return redirect('/listproduct')->with('status', 'Data Product Berhasil Dihapus!');
    }
}
