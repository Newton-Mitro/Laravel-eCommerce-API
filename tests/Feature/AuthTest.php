<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;


    public function test_user_register()
    {
        Role::factory()->count(5)->create();

        $response = $this->postJson('/api/auth/register', [
            'name' => 'customer two',
            'email' => time() . 'customer2@email.com.com',
            'password' => $password = 'password',
            "password_confirmation" => $password,
        ]);

        $response->assertCreated();
        $this->assertDatabaseCount('users', 1);

    }

    public function test_user_login()
    {
        Role::factory()->count(5)->create();
        $password = 'password';
        $email = 'admin@email.com';

        // Creating Buyer Users
        User::factory()->create(['email'=>$email,'password'=>bcrypt($password),'role_id'=>1]);

        $response = $this->postJson('/api/auth/login', [
            'email' => $email,
            'password' => $password,
        ]);

        $response->assertOk();
        $access_token = json_decode($response->content())->access_token;
        // Determine whether the login is successful and receive token
        $this->assertArrayHasKey('access_token', $response->json());

    }
}
