<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoleTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_role_store()
    {      
        $user = User::find(1);
        

        $response = $this->actingAs($user)->post('/role',[
            'name' => 'admin','permissions'=>[1]            
        ]);

        $response->assertJson([
            'success' => true,
        ]);
    }

    public function test_role_update()
    {      
        $user = User::find(1);

        $response = $this->actingAs($user)->put('/role/2',[
            'name' => 'user', 'permissions'=>[1]           
        ]);

        $response->assertJson([
            'success' => true,
        ]);
    }

    public function test_role_delete()
    {      
        $user = User::find(1);

        $response = $this->actingAs($user)->delete('/role/2');

        $response->assertJson([
            'success' => true,
        ]);
    }
}
