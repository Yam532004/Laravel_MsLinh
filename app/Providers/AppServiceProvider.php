<?php

namespace App\Providers;

use App\Models\ProductType;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;
use App\View\Composers\ProfileComposer;
use Illuminate\Support\Facades;

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
        Facades\View::composer(['layouts.header', 'layouts.product-type'], function ($view){
            $producttypes = ProductType::all();
            $view->with('producttypes', $producttypes);
        });
    }
}
