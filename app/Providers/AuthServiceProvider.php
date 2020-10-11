<?php

namespace App\Providers;

use App\AdminGuard;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
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
        Gate::define('mark-attendence',function (User $user){
//            check the status of the attendence detail for against the user
        $attendence_detail = $user->user_profile()->first()->attendence_detail()->first();
//        if not expired then
            return !$attendence_detail->expired;
        });

        Gate::define('view-sidebar',function(User $user){
            return $user->roles()->first()->role !== 'user';
        });


    }

}
