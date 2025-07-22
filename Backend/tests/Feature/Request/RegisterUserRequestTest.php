<?php

namespace Tests\Feature\Request;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterUserRequestTest extends TestCase
{
    use RefreshDatabase;

    protected string $endpoint = '/api/v1/users/register';

    public function test_it_registers_user_with_valid_data(): void
    {
        $payload = [
            'name' => 'Nolan',
            'email' => 'jhonnolan@fakemail.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ];

        $response = $this->postJson($this->endpoint, $payload);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'data' => ['id', 'name', 'email', 'created_at'],
            ]);

        $this->assertDatabaseHas('users', ['email' => 'jhonnolan@fakemail.com']);
    }

    public function test_it_fails_if_name_is_missing(): void
    {
        $payload = [
            'email' => 'fakemail@email.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ];

        $response = $this->postJson($this->endpoint, $payload);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['name']);
    }

    public function test_it_fails_if_email_is_invalid(): void
    {
        $payload = [
            'name' => 'Jhon',
            'email' => 'invalid-email',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ];

        $response = $this->postJson($this->endpoint, $payload);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['email']);
    }

    public function test_it_fails_if_email_is_not_unique(): void
    {
        User::factory()->create(['email' => 'fakemail@email.com']);

        $payload = [
            'name' => 'Nolan',
            'email' => 'fakemail@email.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ];

        $response = $this->postJson($this->endpoint, $payload);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['email']);
    }

    public function test_it_fails_if_password_confirmation_does_not_match(): void
    {
        $payload = [
            'name' => 'Taylor',
            'email' => 'fakemail@email.com',
            'password' => 'password123',
            'password_confirmation' => 'wrongpassword',
        ];

        $response = $this->postJson($this->endpoint, $payload);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['password']);
    }
}
