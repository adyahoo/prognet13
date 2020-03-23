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
=======
    return view('home');
});

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
Route::get('/adminHome', function(){
	return view('admin.home');
})->middleware('admin:admin');	

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
Route::get('/userHome', function(){
	return view('user.home');
})->middleware('admin:user');