<?php

namespace App\Modules\Core\Locations\Other\Providers;

use Illuminate\Support\ServiceProvider;

class LocationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerMigrations();
        $this->registerConfig();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }

    public function registerMigrations()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../../Data/Migrations');
    }

    public function registerConfig()
    {
        $this->publishes([
            __DIR__ . '/../Config/config.php' => config_path('locations.php'),
        ]);
    }
}
