<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
Use Str;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            ['name'=>'create','slug'=>Str::slug('create')],
            ['name'=>'update','slug'=>Str::slug('update')],
            ['name'=>'view','slug'=>Str::slug('view')],
            ['name'=>'delete','slug'=>Str::slug('delete')]
        ];

        DB::table('permissions')->insert($permissions);
    }
}
