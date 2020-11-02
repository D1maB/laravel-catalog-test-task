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
