<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_login()
    {      

        $response = $this->post('/login',[
            'email' => 'admin@admin.com',
            'password'=> '123admin'
        ]);

        $response->assertJson([
            'success' => true,
        ]);
    }
}
