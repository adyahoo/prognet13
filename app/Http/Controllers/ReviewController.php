<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Product;
use App\Product_Review;
use App\Product_Image;
use App\Admin;
use App\Notifications\NewReview;


class ReviewController extends Controller
{
    public function index($id){
    	$all_review = Product_Review::with('Product')->get();
    	$product = Product::with('Product_Image')->find($id);
    	$images = $product->Product_Image;

    	// dd($product->getStar());
    	return view('rating',compact('all_review','images','product'));
    }

    public function store(Request $request){
    	// echo $request->rating;
 		// $userId=Auth::guard('user')->user()->id;   	
 		// $review = new Product_Review;
 		// $review->user_id = $userId;
 		// $review->product_id = $request->product_id;
 		// $review->rating = $request->rating;
 		// $review->content = $request->content;
 		// $review->save();
 		Auth::guard('user')->user()->review()->create($request->all());
        $admins = Admin::all();
        foreach ($admins as $admin) {
            $admin->notify(new NewReview());
        }

 		return back();
    }
}