<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\thems;

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
        // Only run if the "" table exists
        if (Schema::hasTable('thems')) {
            $activeDaisyTheme = DB::table('thems')
                ->where('key', 'active_daisy_theme')
                ->value('value') ?? 'light';

            View::share('activeDaisyTheme', $activeDaisyTheme);
        } else {
            // Fallback when table doesn't exist (e.g. before migration)
            View::share('activeDaisyTheme', 'light');
        }
    }
}
