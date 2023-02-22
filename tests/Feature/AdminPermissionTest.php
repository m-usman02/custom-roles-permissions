<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminPermissionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_permission()
    {      
        $user = User::find(1);

        $response = $this->actingAs($user)->post('check-create');

        $response->assertJson([
            'success' => true,
        ]);
    }

    public function test_update_permission()
    {      
        $user = User::find(1);

        $response = $this->actingAs($user)->put('check-update');

        $response->assertJson([
            'success' => true,
        ]);
    }

    public function test_delete_permission()
    {      
        $user = User::find(1);

        $response = $this->actingAs($user)->delete('check-delete');

        $response->assertJson([
            'success' => true,
        ]);
    }

    public function test_view_permission()
    {      
        $user = User::find(1);

        $response = $this->actingAs($user)->get('check-view');

        $response->assertJson([
            'success' => true,
        ]);
    }
}
