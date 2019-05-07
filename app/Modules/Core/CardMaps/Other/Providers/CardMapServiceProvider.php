<?php

namespace App\Modules\Core\CardMaps\Other\Providers;

use Illuminate\Support\ServiceProvider;

class CardMapServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerMigrations();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    }

    public function registerMigrations()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../../Data/Migrations');
    }
}
