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
Route::get('/order/{s_product}', 'OrderController@index')->name('order.checkout');
Route::get('/product/{s_product}', 'IndexController@product')->name('product.single');
Route::post('/order', 'OrderController@order')->name('order.send');
Route::get('/verify_order/{hash}', 'OrderController@verify')->name('order.verify');

Route::post('/comment/{s_product}', 'CommentController@create')->name('comment.create');


Auth::routes(['register' => false]);

// dashboard
Route::group(['middleware' => 'auth'], function () {
    Route::prefix('dashboard')->name('dashboard.')->group(function () {

        Route::get('/', 'Dashboard\HomeController@index')->name('index');

        Route::resource('product', 'Dashboard\ProductController');
        Route::resource('order', 'Dashboard\OrderController');
        Route::resource('product.comments', 'Dashboard\CommentController');
        Route::post('product/comments/{comment}/verify', 'Dashboard\CommentController@verify')->name('product.comments.verify');

    });
});
