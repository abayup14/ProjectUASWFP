<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
        $this->registerPolicies();
        Gate::define('internal', function ($user) {
            return $user->role != "Pelanggan";
        });
        Gate::define('owner', function ($user) {
            return $user->role == "Owner";
        });
        Gate::define('pelanggan', function ($user) {
            return $user->role == "Pelanggan";
        });
    }
}
