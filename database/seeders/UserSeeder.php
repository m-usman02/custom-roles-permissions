<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123admin')]);
        $user->roles()->attach([1]);

        $user = User::create([
            'name' => 'editor',
            'email' => 'editor@editor.com',
            'password' => bcrypt('123editor')]);
        $user->roles()->attach([2]);

        $user = User::create([
            'name' => 'viewer',
            'email' => 'viewer@viewer.com',
            'password' => bcrypt('123viewer')]);
        $user->roles()->attach([3]);
       
    }
}
