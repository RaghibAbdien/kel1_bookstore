<?php

namespace App\Providers;

use App\Models\Menu;
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
    public function boot()
    {
        // Pastikan menus tersedia di semua halaman yang menggunakan sidebar
        View::composer('layouts.partials.sidebar', function ($view) {
            $view->with('menus', Menu::all()); // Sesuaikan query jika diperlukan
        });
    }
}
