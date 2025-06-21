<?php

namespace Tests\Feature\Http\Controllers\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PingControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_ping_returns_pong(): void
    {
        $response = $this->getJson('/api/v1/ping');

        $response->assertStatus(200);

        $response->assertJson([
            'message' => 'pong',
        ]);
    }
}
