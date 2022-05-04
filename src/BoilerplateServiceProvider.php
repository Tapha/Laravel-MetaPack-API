<?php

namespace YourName\Boilerplate;

use Illuminate\Support\ServiceProvider;
use YourName\Boilerplate\Factories\Client;

class BoilerplateServiceProvider extends ServiceProvider
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
        $source = realpath(__DIR__ . '/../config/Boilerplate.php');

        if (class_exists('Illuminate\Foundation\Application', false)) {
            $this->publishes([ $source => config_path('Boilerplate.php') ], 'config');
        }

        $this->mergeConfigFrom($source, 'Boilerplate');
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Boilerplate', function ($app) {
            $config = $app['config']->get('Boilerplate');
            $client = new Client($config['baseUrl'], $config['token']);
            return new Boilerplate($client);
        });

        $this->app->alias('Boilerplate', 'YourName\Boilerplate\Boilerplate');
    }
}
