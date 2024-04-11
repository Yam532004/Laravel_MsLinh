<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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


Route::get('/products/{id}', [ProductController::class, 'show'])->name('detail');

Route::get('/pricing', [ProductController::class, 'showPricing'])->name('showPricing');

Route::get('/product-type/{id}', [ProductController::class, 'showProductType'])->name('showProductType');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/checkout', [HomeController::class, 'showCart'])->name('showCart');

Route::get('/login', [UserController::class, 'login'])->name('login');

Route::get('/sign-up', [UserController::class, 'signUp'])->name('sign-up');

Route::get('/about-page', [HomeController::class, 'about'])->name('about-page');

Route::get('/contact-page', [HomeController::class, 'contact'])->name('contact-page');

Route::get('/add-to-cart/{id}', [HomeController::class, 'addToCart'])->name('addToCart');

Route::get('/delete/{id}', [HomeController::class, 'delete'])->name('delete-cart-item');

Route::get('/checkout/payment', [CartController::class, 'checkout'])->name('checkout.VNP');

Route::get('/shoping-cart', [CartController::class, 'cart'])->name('shopping-cart');

Route::post('/update-session-quantity/{id}', [HomeController::class, 'updateSessionQuantity'])->name('updateSessionQuantity');

Route::get('/dangky', [HomeController::class, 'getSignin'])->name('getsignin');

Route::post('/dangky', [HomeController::class, 'postSignup'])->name('postsignup');

Route::get('/dangnhap', [HomeController::class, 'getLogin'])->name('getlogin');

Route::post('/dangnhap', [HomeController::class, 'postLogin'])->name('postlogin');

Route::get('/dangxuat', [HomeController::class, 'getLogout'])->name('getlogout');

// Đăng nhập Admin
Route::get('/admin/dangnhap', [UserController::class, 'getLogin'])->name('admin.getLogin');

Route::post('/admin/dangnhap', [UserController::class, 'postLogin'])->name('admin.postLogin');

Route::get('/admin/dangxuat', [UserController::class, 'getLogout']);

Route::group(['prefix' => 'admin', 'middleware' => 'adminLogin'], function () {

    Route::group(['prefix' => 'category'], function () {
        // admin/category/danhsach
        Route::get('danhsach', [ProductController::class, 'getCateList'])->name('admin.getCateList');
        Route::get('them', [ProductController::class, 'getCateAdd'])->name('admin.getCateAdd');
        Route::post('them', [ProductController::class, 'postCateAdd'])->name('admin.postCateAdd');
        Route::get('xoa/{id}', [ProductController::class, 'getCateDelete'])->name('admin.getCateDelete');
        Route::get('sua/{id}', [ProductController::class, 'getCateEdit'])->name('admin.getCateEdit');
        Route::post('sua/{id}', [ProductController::class, 'postCateEdit'])->name('admin.postCateEdit');
    });
});
