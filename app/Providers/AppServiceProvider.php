<?php

namespace App\Providers;

use App\Observers\UserObserver;
use App\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // User::observe(UserObserver::class);
        Paginator::defaultView('vendor.pagination.tailwind');

        Paginator::defaultSimpleView('vendor.pagination.simple-tailwind');
    }
}
