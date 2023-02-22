<?php

namespace App\Providers;

use App\Models\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
class PermissionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        
        try {
            Gate::before(function ($user, $ability) {
                return $user->hasRole('admin') ? true : null;
            });
    
            Permission::get()->map(function ($permission) {                
                Gate::define($permission->slug, function ($user) use ($permission) {
                    return $user->userCan($permission);
                });
            });
        } catch (\Exception $e) {         
            return false;
        }
    }
}
