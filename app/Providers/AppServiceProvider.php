<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Pagination\PaginationServiceProvider;
use Illuminate\Pagination\Paginator;
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
        setlocale(LC_TIME, 'fr_FR.UTF-8');
        Carbon::setLocale('fr');
        \Illuminate\Support\Facades\URL::forceScheme('https');
    }
}
