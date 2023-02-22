<?php

namespace Database\Seeders;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name'=> 'admin']);

        $role = Role::create(['name'=> 'editor']);
        $role->permissions()->attach([1,2]);
          
        $role = Role::create(['name'=> 'viewer']);
        $role->permissions()->attach([3]);

        
    }
}
