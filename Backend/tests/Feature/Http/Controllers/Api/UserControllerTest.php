<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_register_user_works_properly(): void
    {
        $response = $this->postJson('/api/v1/users/register', [
            'name' => 'Jhon',
            'email' => 'jhondoe@example.com',
            'password' => 'password',
        ]);

        $response->assertStatus(201);

        $this->assertDatabaseCount('users', 1);
    }

    public function test_get_all_users_works_properly(): void
    {
        User::factory()->count(5)->create();

        $response = $this->getJson('/api/v1/users/get_all_users');

        $response->assertStatus(200)
            ->assertJsonCount(5, 'users');

        $this->assertDatabaseCount('users', 5);
    }
}
