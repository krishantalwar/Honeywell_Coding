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
    return view('loginType');
});

Route::get('/adminlogin', function () {
    return view('admin/login');
})->name('adminlogin');

Route::get('/userlogin', function () {
    return view('users/login');
})->name('userlogin');

Route::post('/login', 'AuthController@login')->name('login');


Route::middleware('role_or_permission:productAdd')->group(
    function () {
        Route::get('/productadd', 'ProductsController@create')->name('productadd');
        Route::post('/productstore', 'ProductsController@store')->name('productstore');
    }
);

Route::middleware('role_or_permission:productList')->group(function () {
    Route::get('/productList', 'ProductsController@index')->name('productList');
    Route::get('/cart', 'CartController@checkout')->name('cart');
});
