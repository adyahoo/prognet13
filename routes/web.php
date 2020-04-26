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

// <<<<<<< HEAD
Route::get('/', 'HomesController@index');
Route::get('/products', 'ProductsController@index');
Route::get('/products/{product}', 'ProductsController@show');
Route::get('/datauser', 'UsersController@index');
Route::get('/dataadmin', 'AdminsController@index');

Route::get('/listproduct', 'ListProductsController@index');
Route::get('/listproduct/{product}/edit', 'ListProductsController@edit');
Route::patch('/listproduct/{product}', 'ListProductsController@update');
Route::delete('/listproduct/{product}', 'ListProductsController@destroy');
Route::get('/buatproduct', 'ListProductsController@create');
Route::POST('/buatproduct', 'ListProductsController@store');

Route::get('/listcategory', 'CategoriesController@index');
Route::get('/listcategory/{category}/edit', 'CategoriesController@edit');
Route::patch('/listcategory/{category}', 'CategoriesController@update');
Route::delete('/listcategory/{category}', 'CategoriesController@destroy');
Route::get('/buatcategory', 'CategoriesController@create');
Route::POST('/buatcategory', 'CategoriesController@store');

Route::get('/listcourier', 'CouriersController@index');
Route::get('/listcourier/{courier}/edit', 'CouriersController@edit');
Route::patch('/listcourier/{courier}', 'CouriersController@update');
Route::delete('/listcourier/{courier}', 'CouriersController@destroy');
Route::get('/buatcourier', 'CouriersController@create');
Route::POST('/buatcourier', 'CouriersController@store');

Route::get('/dashboard', function () {
    return view('account.dashboard');
});

// Route::get('/register', function () {
//     return view('register');
// });

// Route::get('/loginn', function () {
//     return view('loginn');
// });

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
    return view('products.shopdetail');
});

Route::get('/wishlist', function () {
    return view('wishlist');
});



Route::get('/tabel', function () {
    return view('tabel');
});
=======
// Route::get('/', function () {
//     return view('home');
// });

//route admin
Route::post('/adminLogin','AdminController@loginAdmin');
Route::get('/adminLogin', function(){
	return view('auth.adminlogin');
});
Route::post('/adminRegister','AdminController@registerAdmin');
Route::get('/adminRegister', function(){
	return view('auth.adminregister');
});
Route::get('/adminLogout','AdminController@logoutAdmin');
Route::get('/adminHome', 'AdminController@index')->middleware('admin:admin');	

//route user
Route::post('/userLogin','UserController@loginUser');
Route::get('/userLogin', function(){
	return view('auth.userlogin');
})->name('login');
Route::post('/userRegister','UserController@registerUser');
Route::get('/userRegister', function(){
	return view('auth.userregister');
});
Route::get('/userLogout','UserController@logoutUser');
Route::get('/userHome', 'UserController@index')->middleware('admin:user');
>>>>>>> master
