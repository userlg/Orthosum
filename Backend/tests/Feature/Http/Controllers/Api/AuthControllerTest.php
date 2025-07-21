<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_user_works_properly(): void
    {

        $user = User::factory()->create();

        $response = $this->postJson('/api/v1/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response->assertJsonCount(3, 'data');

        $response->assertJsonStructure([
            'data' => ['access_token', 'token_type', 'user'],
        ]);

        $response->assertStatus(200);
    }

    public function test_login_user_with_wrong_credentials(): void
    {

        $response = $this->postJson('/api/v1/login', [
            'email' => 'fakemail@email.com',
            'password' => 'password',
        ]);

        $response->assertStatus(401);
    }

    public function test_login_validation_requires_email_and_password(): void
    {
        $response = $this->postJson('/api/v1/login', []);

        $response->assertStatus(422); // Unprocessable Entity
        $response->assertJsonValidationErrors(['email', 'password']);
    }

    public function test_login_validation_fails_with_invalid_email_format(): void
    {
        $response = $this->postJson('/api/v1/login', [
            'email' => 'not-an-email',
            'password' => 'secret123',
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['email']);
    }

    public function test_guest_cannot_logout(): void
    {
        $response = $this->postJson('/api/v1/logout');

        $response->assertStatus(401);

    }

    public function test_authenticated_user_can_logout()
    {

        $user = User::factory()->create();

        Sanctum::actingAs($user, ['*']);

        $response = $this->postJson('/api/v1/logout');

        $response->assertStatus(200);

        $response->assertJson([
            'message' => 'Logged out',
        ]);

        $this->assertCount(0, $user->tokens);
    }
}
