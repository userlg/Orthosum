<?php

namespace Tests\Feature\Request;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Storage;
use Tests\TestCase;

class StoreImageRequestTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_endpoint_rejects_invalid_file(): void
    {
        $response = $this->postJson('/api/v1/upload_image', []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors('image');
    }

    public function test_store_endpoint_accepts_valid_file(): void
    {

        Storage::fake('local');

        $file = UploadedFile::fake()->image('fake_image.jpg');

        $response = $this->postJson('/api/v1/upload_image', [
            'image' => $file,
            'width' => 300,
            'height' => 300,
        ]);

        $response->assertStatus(201)
            ->assertJson(['success' => true]);

        Storage::disk('local')->deleteDirectory('images');
    }
}
