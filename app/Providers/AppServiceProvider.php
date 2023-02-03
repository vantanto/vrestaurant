<?php

namespace App\Providers;

use App\Models\Gallery;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('layouts.app', function ($view) {
            $galleries = Gallery::where('active', true)
                ->orderBy('id', 'desc')
                ->limit(12)
                ->get();
            $view->with('galleries', $galleries);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
