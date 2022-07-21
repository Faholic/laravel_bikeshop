<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductControllerApi;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('/product', [App\Http\Controllers\Api\ProductControllerApi::class, 'product_list']);
Route::get('/category', [App\Http\Controllers\Api\CategoryControllerApi::class, 'category_list']);
Route::get('/product/{category_id?}', [App\Http\Controllers\Api\ProductControllerApi::class, 'product_list']);
Route::get('/product/search', [App\Http\Controllers\Api\ProductControllerApi::class, 'product_search']);
Route::post('/product/search', [App\Http\Controllers\Api\ProductControllerApi::class, 'product_search']);

