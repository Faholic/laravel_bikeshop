<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CartMiddleware;
use Illuminate\Support\Facades\Auth;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',function() { 
    return view('layouts.master'); 
});

Route::get('/product', [App\Http\Controllers\ProductController::class, 'index']);
Route::get('/product/search', [App\Http\Controllers\ProductController::class, 'search']);
Route::post('/product/search', [App\Http\Controllers\ProductController::class, 'search']);

Route::get('/product/edit/{id?}', [App\Http\Controllers\ProductController::class, 'edit']);

Route::post('/product/update', [App\Http\Controllers\ProductController::class, 'update']);

Route::post('/product/insert', [App\Http\Controllers\ProductController::class, 'insert']);

Route::get('/product/remove/{id}', [App\Http\Controllers\ProductController::class, 'remove']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/cart/view', [App\Http\Controllers\CartController::class, 'viewCart']);
Route::get('/cart/add/{id}', [App\Http\Controllers\CartController::class, 'addToCart']);
Route::get('/cart/delete/{id}', [App\Http\Controllers\CartController::class, 'deleteCart']);
Route::get('/cart/update/{id}/{qty}', [App\Http\Controllers\CartController::class, 'updateCart']);
Route::get('/cart/checkout', [App\Http\Controllers\CartController::class, 'checkout']);
Route::get('/cart/complete', [App\Http\Controllers\CartController::class, 'complete']);

Route::group(['middleware' => ['auth']], function() {
    Route::get('/logout', [LogoutController::class, 'perform'])->name('logout.perform');
 });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/user' , [App\Http\Controllers\UserController::class,'index']);
Route::post('/user/search/' , [App\Http\Controllers\UserController::class,'search']);
Route::post('/user/edit/' , [App\Http\Controllers\UserController::class,'insert']);
Route::get('/user/edit/{id?}' , [App\Http\Controllers\UserController::class,'edit']);
Route::post('/user/update' , [App\Http\Controllers\UserController::class,'update']);
Route::get('/user/remove/{id}' , [App\Http\Controllers\UserController::class,'remove']);

