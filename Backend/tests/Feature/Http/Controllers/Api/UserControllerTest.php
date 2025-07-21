<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    protected string $endpoint = '/api/v1/users/register';

    public function test_register_user_works_properly(): void
    {
        $payload = [
            'name' => 'Nolan',
            'email' => 'jhonnolan@fakemail.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ];


        $response = $this->postJson($this->endpoint, $payload);

        $response->assertStatus(201);

        $this->assertDatabaseCount('users', 1);
    }

    public function test_get_all_users_works_properly(): void
    {
        User::factory()->count(5)->create();

        $response = $this->getJson('/api/v1/users/get_all');

        $response->assertStatus(200)
            ->assertJsonCount(5, 'data');

        $this->assertDatabaseCount('users', 5);
    }
}
