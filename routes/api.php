<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::any('register',"UserController@register");
/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/user', 'UserController@details');
       
});
Route::post('excel_import', 'ExcelController@store'); 
Route::post('excel_details', 'ExcelController@details'); 