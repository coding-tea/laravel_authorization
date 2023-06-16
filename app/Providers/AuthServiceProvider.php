<?php

namespace App\Providers;

use App\Models\Announce;
use App\Models\User;
use App\Policies\gerer_announce;
use Illuminate\Auth\Access\Response;
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
        Announce::class => gerer_announce::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('add_announce', function(User $user){
            return $user->role == 'admin' || $user->role == 'Annonceur';
        });

        Gate::define('change_etat', function(User $user){
            return ($user->role == 'admin' || $user->role == 'moderateur') ? Response::allow() : Response::deny();
        });
    }
}
