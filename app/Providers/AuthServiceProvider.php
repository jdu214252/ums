<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use App\Policies\AdminPolicy;
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
        User::class => AdminPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('delete-student', function(User $user, Student $student){
            return $user->is_superadmin;
        });

        Gate::define('update-student', function(User $user, Student $student){
            return $user->id == $student->user_id || $user->is_superadmin;
        });

   
        
    }
}
