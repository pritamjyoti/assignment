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
    return view('welcome');
});

Auth::routes();

Route::any('excel', 'ExcelController@store'); 
Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index');
    Route::resource('product', 'ProductController');
});

    Route::get('/customer', 'CustomerController@index');
    Route::get('/product_list', 'CustomerController@product');
  
Route::any('customer_login', 'CustomerController@login');
Route::any('customer_register', 'CustomerController@register');