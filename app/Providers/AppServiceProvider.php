<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use App\Models\Carts;
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
        //
        View::composer('*', function ($view) {

        $cartCount = 0;

        if (auth()->check()) {
            $cartCount = Carts::where('user_id', auth()->id())
                             ->sum('total_items'); // or ->count()
        }

        $view->with('cartCount', $cartCount);
    });
    }
}
