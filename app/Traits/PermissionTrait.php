<?php

namespace App\Traits;

trait PermissionTrait {
   
    public function userCan($permission) 
    {
        return $this->hasPermission($permission);
    }

    public function hasPermission($permission) 
    {
        foreach ($permission->roles as $role)
        {
            if($this->roles->contains($role)) {
                return true;
            }
        }
        return false;
    }
    public function roles() 
    {
       return $this->belongsToMany(Role::class,'users_roles');    
    }

    public function hasRole( ... $roles ) 
    {
        foreach ($roles as $role) {
            if ($this->roles->contains('name', $role)) {
                return true;
            }
        }
        return false;
    }

}

