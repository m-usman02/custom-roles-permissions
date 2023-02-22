<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PermissionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_permission_store()
    {      
        $user = User::find(1);
        

        $response = $this->actingAs($user)->post('/permission',[
            'name' => 'Post Store',           
        ]);

        $response->assertJson([
            'success' => true,
        ]);
    }

    public function test_permission_update()
    {      
        $user = User::find(1);

        $response = $this->actingAs($user)->put('/permission/2',[
            'name' => 'Post Update',          
        ]);

        $response->assertJson([
            'success' => true,
        ]);
    }

    public function test_permission_delete()
    {      
        $user = User::find(1);

        $response = $this->actingAs($user)->delete('/permission/2');

        $response->assertJson([
            'success' => true,
        ]);
    }
}
