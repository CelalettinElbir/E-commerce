<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
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

        view()->composer('layouts.user_partials.header', function ($view) {

            $favoriteCount = auth()->check() ? auth()->user()->favoriteCount() : 0;
            $view->with('favoriteCount', $favoriteCount);


            $brands = Brand::all();
            $view->with('brands', $brands);
            // $categories = Category::all();
            // $view->with('categories', $categories);



            $categories = Category::with('products')->get()->each(function ($category) {
                $category->setRelation('products', $category->products->take(4));
            });
            $view->with('categories', $categories);
        });

        view()->composer('layouts.user', function ($view) {
            $categories = Category::all();
            $view->with('categories', $categories);


            $brands = Brand::all();
            $view->with('brands', $brands);
        });
    }
}
