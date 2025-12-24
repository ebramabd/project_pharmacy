<?php

namespace Tests\Feature\Api;

use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthFeatureTest extends TestCase
{
   use RefreshDatabase;

   public function test_user_can_register()
    {
        $payload = [
            'user_name' => 'newuser3',
            'password' => 'secret123',
        ];

        $response = $this->postJson('/api/auth/register', $payload);

        $response->assertStatus(201);

        $this->assertDatabaseHas('users', [
            'user_name' => 'newuser3',
        ]);
    }

    public function test_user_cannot_register_with_existing_username()
    {
        Admin::factory()->create([
            'user_name' => 'existinguser',
        ]);

        $payload = [
            'user_name' => 'existinguser',
            'password' => 'secret123',
        ];

        $response = $this->postJson('/api/auth/register', $payload);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['user_name']);
    }

   public function test_user_cannot_login_with_wrong_credentials()
    {
        $user = Admin::factory()->create([
            'user_name' => 'testuser',
            'password' => bcrypt('password123'),
        ]);

        $payload = [
            'user_name' => 'testuser',
            'password' => 'wrongpassword',
        ];

        $response = $this->postJson('/api/auth/login', $payload);

        $response->assertStatus(401)
                 ->assertJson([
                     'message' => 'Invalid credentials',
                 ]);
    }

    public function test_authenticated_user_can_logout()
    {
        $user = Admin::factory()->create([
            'user_name' => 'testuser2',
            'password' => bcrypt('password123'),
        ]);

        $token = $user->createToken('api')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->postJson('/api/logout');

        $response->assertStatus(200)
                 ->assertJson([
                     'message' => 'Logged out successfully',
                 ]);
    }

}
