<?php

namespace Tests\Feature\Routes;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserSanctumRouteTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_access_user_endpoint(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user, 'sanctum')
            ->getJson('api/v1/user');

        $response->assertStatus(200);
        $response->assertJson([
            'id' => $user->id,
            'email' => $user->email,
        ]);
    }

    public function test_guest_cannot_access_user_endpoint(): void
    {
        $response = $this->getJson('api/v1/user');

        $response->assertStatus(401);
    }
}
