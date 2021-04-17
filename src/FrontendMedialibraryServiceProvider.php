<?php

namespace GTerrusa\FrontendMedialibrary;

use Illuminate\Support\ServiceProvider;

class FrontendMedialibraryServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'gterrusa');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'gterrusa');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/frontendmedialibrary.php', 'frontendmedialibrary');

        // Register the service the package provides.
        // $this->app->singleton('frontendmedialibrary', function ($app) {
        //     return new FrontendMedialibrary;
        // });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['frontendmedialibrary'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/frontendmedialibrary.php' => config_path('frontendmedialibrary.php'),
        ], 'frontendmedialibrary.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/gterrusa'),
        ], 'frontendmedialibrary.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/gterrusa'),
        ], 'frontendmedialibrary.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/gterrusa'),
        ], 'frontendmedialibrary.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
