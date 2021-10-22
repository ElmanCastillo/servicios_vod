<?php

namespace App\Providers;

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
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
        // we return true for any $user that is passed to these abilities
        Gate::define('admin.post.index', function ($user) { return true; });
        Gate::define('admin.post.create', function ($user) { return true; });
        Gate::define('admin.post.edit', function ($user) { return true; });
        Gate::define('admin.post.delete', function ($user) { return true; });
    }
}
