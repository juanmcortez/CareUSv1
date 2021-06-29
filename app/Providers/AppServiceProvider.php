<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
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
        if (env('APP_ENV') === 'production') {
            // Force HTTPS on pagination
            $this->app['request']->server->set('HTTPS', 'on');
            // Force HTTPS
            URL::forceSchema('https');
        }
        if (env('APP_ENV') !== 'local') {
            // Force HTTPS
            URL::forceScheme('https');
        }
        if (env('APP_FORCE_HTTPS', false)) {
            // Force HTTPS
            URL::forceScheme('https');
        }
    }
}
