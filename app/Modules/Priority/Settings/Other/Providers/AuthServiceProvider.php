<?php

namespace App\Settings\Priority\Settings\Other\Providers;

use App\Modules\Priority\Settings\Data\Models\Setting;
use App\Settings\Priority\Settings\Other\Policies\SettingPolicy;
use App\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Setting::class => SettingPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
