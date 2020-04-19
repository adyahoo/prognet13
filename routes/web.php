<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/loginn', function () {
    return view('loginn');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/galery', function () {
    return view('galery');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('/myaccount', function () {
    return view('myaccount');
});

Route::get('/shop', function () {
    return view('shop');
});

Route::get('/shopdetail', function () {
    return view('shopdetail');
});

Route::get('/wishlist', function () {
    return view('wishlist');
});