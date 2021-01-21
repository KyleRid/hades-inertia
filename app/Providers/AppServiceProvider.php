<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Inertia\Inertia;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Inertia::share('app.name', config('app.name'));
        Inertia::share('errors', function() {
            return session()->get('errors') ? session()->get('errors')->getBag('default')->getMessages() : (object)[];
        });
        Inertia::share('successMessages', function() {
            return session()->get('successMessage') ? session()->get('successMessage') : null;
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
        Schema::defaultStringLength(191);
    }
}
