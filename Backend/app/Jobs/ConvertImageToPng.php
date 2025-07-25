<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class ConvertImageToPng implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected string $tempPath;

    protected string $extension;

    protected int $width;

    protected int $height;

    public function __construct(string $tempPath, string $extension, int $width, int $height)
    {
        $this->tempPath = $tempPath;
        $this->extension = $extension;
        $this->width = $width;
        $this->height = $height;
    }

    public function handle(): void
    {
        $absolutePath = storage_path('app/'.$this->tempPath);

        if (! file_exists($absolutePath)) {
            logger()->error("Temp file not found: {$absolutePath}");

            return;
        }

        $image = Image::read($absolutePath)
            ->resize($this->width, $this->height);

        $filename = Str::random(40).'.png';
        $savePath = 'images/'.$filename;

        Storage::disk('public')->put(
            $savePath,
            $image->encodeByExtension('png', 90)
        );

        logger()->info("Imagen procesada y guardada en: storage/app/public/{$savePath}");

        @unlink($absolutePath);
    }
}
