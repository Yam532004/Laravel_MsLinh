<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SlideController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [ProductController::class, 'index']);

Route::get('/home', [ProductController::class, 'home']);

Route::get('/products/slides', [SlideController::class. 'index']);
Route::get('/products/{id}', [ProductController::class, 'show'])->name('product/detail');

Route::get('/customer/register', [CustomerController::class, 'index']);
Route::get('/productType/{id}', [ProductController::class, 'getProductType'])->name('getProductType');
Route::get('/add-to-cart/{id}',[ProductController::class,'addToCart'])->name('banhang.addtocart');