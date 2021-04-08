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


Route::apiResource('/home', 'OrderController');
Route::get('/orderList/{id}', 'OrderController@orderList');
Route::apiResource('/company', 'CompanyController');
Route::apiResource('/product', 'ProductController');
Route::apiResource('/dchallan', 'DChallanController');
Route::get('/dcList/{id}', 'DChallanController@dcList');

Route::apiResource('/mycompany', 'MyCompanyController');
Route::apiResource('/productList', 'ProductListController');
Route::post('/searchProduct', 'ProductListController@searchProduct');

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
