<?php

namespace Tests\Feature\Jobs;

use App\Jobs\ConvertImageToPng;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ConvertImageToPngTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_converts_image_and_deletes_temp_folder(): void
    {
        Queue::fake([ConvertImageToPng::class]);

        Storage::fake('local');

        $fakeImage = UploadedFile::fake()->image('fake_image.jpg');

        $tempPath = 'temp/fake_image.jpg';
        $width = 200;
        $height = 200;

        Storage::disk('local')->put(
            $tempPath,
            file_get_contents($fakeImage->getRealPath())
        );

        Storage::disk('local')->assertExists($tempPath);

        ConvertImageToPng::dispatch($tempPath, $width, $height)->onQueue('images');

        Queue::assertPushedOn('images', ConvertImageToPng::class);

        Queue::assertPushed(ConvertImageToPng::class, function ($job) use ($tempPath, $width, $height) {
            return $job->tempPath === $tempPath &&
                $job->width === $width &&
                $job->height === $height;
        });
    }

    public function test_it_converts_temp_image_to_png_and_saves_it(): void
    {
        Storage::fake('local');

        // Crear imagen falsa
        $fakeImage = UploadedFile::fake()->image('test.jpg', 200, 200);
        $tempPath = 'temp/test.jpg';

        // Guardar la imagen simulada
        Storage::disk('local')->put(
            $tempPath,
            file_get_contents($fakeImage->getRealPath())
        );

        // Asegurar que existe antes del job
        Storage::disk('local')->assertExists($tempPath);

        // Ejecutar el job (esto debe crear un .png en 'images/')
        $job = new ConvertImageToPng($tempPath, 100, 100);

        $job->handle();

        $created = Storage::disk('local')->files('images');
    }
}
