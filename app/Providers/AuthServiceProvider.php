<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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
       $this->registerPolicies();

    Gate::define('is-admin', function (User $user) {
        return $user->hasRole('admin');
    });

    Gate::define('is-editor', function (User $user) {
        return $user->hasRole('editor');
    });

    Gate::define('manage-category', function (User $user) {
        return $user->hasRole('categoryMng') || $user->hasRole('admin');
    });

    Gate::define('manage-tour', function (User $user) {
        return $user->hasRole('tourMng') || $user->hasRole('admin');
    });

    Gate::define('manage-users', function (User $user) {
        return $user->hasRole('admin');
    });
    }
}
