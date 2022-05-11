<?php

namespace App\Providers;

use App\Models\Error;
use App\Policies\BacklogPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Error::class => BacklogPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('is_admin', function ($user) {
            return $user->role == 'admin';
        });

        Gate::define('is_production', function ($user) {
            return $user->role == 'production';
        });

        Gate::define('is_driver', function ($user) {
            return $user->role == 'driver';
        });
    }
}
