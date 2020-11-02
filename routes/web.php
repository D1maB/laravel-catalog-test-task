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

Route::get('/', 'IndexController@index')->name('index');
Route::get('/order/{product}', 'OrderController@index')->name('order.checkout');
Route::get('/product/{product}', 'IndexController@product')->name('product.single');
Route::post('/order', 'OrderController@order')->name('order.send');
Route::get('/verify_order/{hash}', 'OrderController@verify')->name('order.verify');


Auth::routes(['register' => false]);

#Route::get('/dashboard', 'DashboardController@index')->name('dashboard');


// dashboard
Route::group(['middleware' => 'auth'], function () {
    Route::prefix('dashboard')->name('dashboard.')->group(function () {

        Route::get('/', 'Dashboard\HomeController@index')->name('index');

        // Products
        Route::resource('product', 'Dashboard\ProductController');

    });
});
