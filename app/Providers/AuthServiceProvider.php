<?php

namespace App\Providers;

use App\Models\Conversation;
use App\Models\User;
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


        // Gate::define('update-conversation', function (?User $user, Conversation $conversation) {
        //     return true;
        // }); //in case we want authorization for guests, we can make user optional



        // Gate::define('update-conversation', function (User $user, Conversation $conversation) {
        //     return $conversation->user->is($user); // if the conversation owner is the current user, then you are 
        //     //authorized to mark best reply
        // });


        Gate::before(function (User $user) { //global before hook


            if ($user->id == 47) { //admin
                return true;
            }
        });
    }
}
