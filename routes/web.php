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
Route::get('/products', 'TransactionsController@index');
Route::get('/products/{id}', 'TransactionsController@create');
Route::post('/products/{id}', 'TransactionsController@store');
Route::post('/products/{id}/cart', 'CartsController@store');

// Route::get('/products', 'ProductsController@index');
// Route::get('/products/{product}', 'ProductsController@show');
// Route::get('/datauser', 'UsersController@index');
// Route::get('/dataadmin', 'AdminsController@index');

// Route::get('/profiluser', function () {
//     return view('user.profiluser');
// })->middleware('admin:user');

// Route::get('/dashboardUser', function(){
//     return view('account.dashboardUser');
// })->middleware('admin:user');

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

// Route::get('/', function () {
//     return view('home');
// });

//route admin
Route::post('/adminLogin','AdminController@loginAdmin');
Route::get('/adminLogin', function(){
	return view('auth.adminlogin');
});

Route::get('/adminLogout','AdminController@logoutAdmin');

Route::get('/dashboardAdmin','AdminController@index');

Route::group(['middleware' => 'isAdmin'], function(){
    Route::get('/listproduct', 'ListProductsController@index');  
    Route::get('/listproduct/{product}/edit', 'ListProductsController@edit');
    Route::patch('/listproduct/{product}', 'ListProductsController@update');
    Route::delete('/listproduct/{product}', 'ListProductsController@destroy');
    Route::get('/buatproduct', 'ListProductsController@create');
    Route::POST('/buatproduct', 'ListProductsController@store');  

    Route::get('/listcourier', 'CouriersController@index');
    Route::get('/listcourier/{courier}/edit', 'CouriersController@edit');
    Route::patch('/listcourier/{courier}', 'CouriersController@update');
    Route::delete('/listcourier/{courier}', 'CouriersController@destroy');
    Route::get('/buatcourier', 'CouriersController@create');
    Route::POST('/buatcourier', 'CouriersController@store');

    Route::get('/listcategory', 'CategoriesController@index');
    Route::get('/listcategory/{category}/edit', 'CategoriesController@edit');
    Route::patch('/listcategory/{category}', 'CategoriesController@update');
    Route::delete('/listcategory/{category}', 'CategoriesController@destroy');
    Route::get('/buatcategory', 'CategoriesController@create');
    Route::POST('/buatcategory', 'CategoriesController@store');

    Route::get('/konfirmasiAdmin', 'TransactionsAdmin@konfirmasiAdmin');
    Route::get('/datauser', 'TransactionsAdmin@dataUser');
    Route::get('/dataadmin', 'TransactionsAdmin@dataAdmin');

    Route::get('/responseadmin', 'TransactionsAdmin@review');
    Route::post('/responseadmin', 'TransactionsAdmin@response');
    Route::delete('/deleteReview/{id}','TransactionsAdmin@deleteResponse');

    Route::delete('/declineAdmin/{id}','TransactionsAdmin@declineKonf');
    Route::post('/approveAdmin','TransactionsAdmin@updateKonf');

    Route::post('/adminRegister','TransactionsAdmin@registerAdmin');
    Route::get('/adminRegister', function(){
        return view('auth.adminregister');
    });
});

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
Route::get('/profiluser', 'UserController@TampilUser');

Route::group(['middleware' => 'isUser'], function(){
    Route::get('/pesananuser', 'TransactionsController@pesananUser');
    Route::post('/pesananuser/konfirmasi', 'TransactionsController@updateKonf');
    Route::delete('/pesananuser/{transaction}', 'TransactionsController@destroy');
    Route::get('/cartuser', 'CartsController@create');
    Route::get('/cartuser/{cart}/edit', 'CartsController@edit');
    Route::post('/cartuser/{cart}', 'CartsController@update');
    Route::delete('/cartuser/{cart}', 'CartsController@destroy');
    Route::post('/cartuser', 'CartsController@transaction');
});

//route rating
Route::get('/rating/{product}','ReviewController@index');
Route::get('/ratingForm','ReviewController@show');
Route::resource('postRating','ReviewController');

//route ongkir
Route::get('/getCity/ajax/{id}','TransactionsController@getCityAjax');
// Route::get('/ongkir','OngkirController@index');

//route update status expired
Route::get('/pesananuser/expired/{id}','TransactionsController@updateExpired');

//route notif
Route::get('/markRead', function(){
    if (Auth::guard('user')->check()) {
        Auth::guard('user')->user()->unreadNotifications->markAsRead();
        return redirect('/profiluser');
    }elseif (Auth::guard('admin')->check()) {
        Auth::guard('admin')->user()->unreadNotifications->markAsRead();
        return redirect('/dashboardAdmin');
    }

});

//route report
Route::post('/reportBulan','TransactionsController@getBulan');
Route::post('/reportTahun','TransactionsController@getTahun');
Route::post('/grafik','TransactionsController@grafik');
Route::get('/grafik','TransactionsController@getGrafik');
Route::get('/getNotif','NotifController@getNotif');
