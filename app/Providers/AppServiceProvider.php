<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
             View::composer('website.layouts.header', function ($view) {
       $categoryies = Category::with('stores')->get();

        $view->with('categoryies', $categoryies);
    });
    }
}
