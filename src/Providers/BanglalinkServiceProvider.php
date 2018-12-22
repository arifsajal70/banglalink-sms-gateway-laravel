<?php

namespace Arifsajal\BanglalinkSmsGatewayLaravel\Providers;

use Arifsajal\BanglalinkSmsGatewayLaravel\Services\BanglalinkServices;
use Illuminate\Support\ServiceProvider;

class BanglalinkServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/banglalinkSmsGateway.php', 'BanglalinkSmsGateway');

        $this->app->singleton('banglalinksmsgatewaylaravel', function ($app) {
            return new BanglalinkServices();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['banglalinksmsgatewaylaravel'];
    }
}
