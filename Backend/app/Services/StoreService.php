<?php

namespace App\Services;

use App\Jobs\ConvertImageToPng;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StoreService
{
    public function store(UploadedFile $file): string
    {

        $filename = Str::random(40).'.'.$file->getClientOriginalExtension();

        $path = 'temp/'.$filename;

        Storage::disk('local')->put($path, file_get_contents($file));

        $this->transformImageFile($path, 300, 300);

        return $path;
    }

    public function transformImageFile(string $tempPath, int $width, int $height): void
    {
        ConvertImageToPng::dispatch($tempPath, $width, $height);
    }
}
