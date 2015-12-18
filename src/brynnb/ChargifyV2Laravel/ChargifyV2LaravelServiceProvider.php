<?php
namespace brynnb\ChargifyV2Laravel;
use Illuminate\Support\ServiceProvider;
use Crucial\Service\ChargifyV2;
use Config;

class ChargifyV2LaravelServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes(array(
            __DIR__.'/chargify.php' => config_path('chargify.php')
        ), 'config');

        $this->mergeConfigFrom(__DIR__.'/chargify.php', 'chargify');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind('chargifyv2', function ($app) {

             $chargify = new ChargifyV2(config('chargify'));

            return $chargify;

        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('chargifyv2');
    }

}