<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Models\Summary;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SummaryControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_all_summaries_works_properly(): void
    {

        $user = User::factory()->create();

        Summary::factory()->count(5)->create();

        $response = $this->actingAs($user)->getJson('/api/v1/summaries');

        $response->assertJsonCount(5, 'data');

        $response->assertJsonStructure([
            'data' => [
                '*' => ['id', 'patient', 'date', 'phase', 'created_at', 'updated_at'],
            ],
        ]);

        $response->assertStatus(200);
    }
}
