<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SettingProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('App/Services/SettingService' , 'App/Services/SettingServiceInterface');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
