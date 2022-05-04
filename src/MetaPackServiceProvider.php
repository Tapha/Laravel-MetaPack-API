<?php

namespace tapha\MetaPack;

use Illuminate\Support\ServiceProvider;
use tapha\MetaPack\Factories\Client;

class MetaPackServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->setupConfig();
    }

    /**
     * Setup the config.
     *
     * @return void
     */
    protected function setupConfig()
    {
        $source = realpath(__DIR__ . '/../config/MetaPack.php');

        if (class_exists('Illuminate\Foundation\Application', false)) {
            $this->publishes([ $source => config_path('MetaPack.php') ], 'config');
        }

        $this->mergeConfigFrom($source, 'MetaPack');
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('MetaPack', function ($app) {
            $config = $app['config']->get('MetaPack');
            $client = new Client($config['baseUrl'], $config['token']);
            return new MetaPack($client);
        });

        $this->app->alias('MetaPack', 'tapha\MetaPack\MetaPack');
    }
}
