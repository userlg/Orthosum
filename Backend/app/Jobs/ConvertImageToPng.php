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

    public string $tempPath;

    public int $width;

    public int $height;

    public function __construct(string $tempPath, int $width, int $height)
    {
        $this->tempPath = $tempPath;
        $this->width = $width;
        $this->height = $height;
    }

    public function handle(): void
    {

        $absolutePath = Storage::get($this->tempPath);

        $image = Image::read($absolutePath)->resize($this->width, $this->height);

        $filename = Str::random(40).'.png';

        Storage::disk('local')->put(
            'images/'.$filename,
            $image->encodeByExtension('png', 90)
        );

        Storage::disk('local')->deleteDirectory('temp');
    }
}
