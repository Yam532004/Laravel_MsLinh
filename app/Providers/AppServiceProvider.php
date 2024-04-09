<?php

namespace App\Providers;

use App\Models\ProductType;
// use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\View as ViewFacade;
use Illuminate\Support\ServiceProvider;
// use App\View\Composers\ProfileComposer;
use Illuminate\Support\Facades;
use Illuminate\View\View\composer;
use Illuminate\View\View;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Facades\View::composer(['layout.header', 'product_type'], function (View $view) {
            $producttypes = ProductType::all();
            //truyền biến $producttypes cho view header và product-type thông qua biến $view
            $view->with('producttypes', $producttypes);
        });
        //chia sẻ biến Session('cart') cho các view header.blade.php và checkout.php
        Facades\View::composer(['layout.header', 'pages.checkout', 'pages.shopping-cart'], function (View $view) {
            if (Session('cart')) {
                $oldCart = Session::get('cart'); //session cart được tạo trong method addToCart của PageController
                $cart = new Cart();
                $cart = $oldCart;
                $view->with(['cart' => Session::get('cart'), 'productCarts' => $cart->items, 'totalPrice' => $cart->totalPrice, 'totalQty' => $cart->totalQty]);
            }
        });
    }
}
