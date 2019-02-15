<?php

namespace App\Providers;

use App\Policies\PolicyPolicy;
use App\Policies\PostPolicy;
use App\Policy;
use App\Post;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
		Post::class => PostPolicy::class,
		Policy::class => PolicyPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->registerGates();
    }

    public function registerGates()
	{
		Gate::define('is-admin', function($user) {
			return $user->role->name === 'admin';
		});

		Gate::define('is-editor', function($user) {
			return $user->role->name === 'editor';
		});
	}
}
