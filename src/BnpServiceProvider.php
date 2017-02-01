<?php

namespace Gentor\BnpPF;


use Illuminate\Support\ServiceProvider;

/**
 * Class BnpServiceProvider
 *
 * @package Gentor\BnpPF
 */
class BnpServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('bnp', function ($app) {
            return new BnpService($app['config']['bnp']);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['bnp'];
    }

}