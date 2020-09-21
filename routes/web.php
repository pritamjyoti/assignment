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
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/product_order', 'ProductController@product_order')->name('product_order');
    Route::resource('product', 'ProductController');

});

    Route::get('customer', 'CustomerController@index')->name('customer');
    Route::get('product_list', 'CustomerController@product');
   Route::post('add_to_cart', 'CustomerController@add_to_cart');
   
   Route::get('cart_list', 'CustomerController@cart_list');
   Route::get('order_list', 'CustomerController@order_list');
   Route::get('order', 'CustomerController@order');
   Route::get('cart_delete/{id}', 'CustomerController@cart_delete');
   
  
Route::any('customer_login', 'CustomerController@login');
Route::any('customer_register', 'CustomerController@register');