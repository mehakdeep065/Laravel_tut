<?php

namespace App\Providers;

use App\Models\thems;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
         $activeDaisyTheme = thems::where('key', 'active_daisy_theme')->value('value') ?? 'light';
            View::share('activeDaisyTheme', $activeDaisyTheme);
    }
}
