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

        $this->transformImageFile($path, $file->getClientOriginalExtension(), 300, 300);

        $this->delete($path);

        return $path;
    }

    public function transformImageFile(string $tempPath, string $extension, int $width, int $height): void
    {
        ConvertImageToPng::dispatch($tempPath, $extension, $width, $height);
    }

    public function delete(string $path): void
    {
        Storage::disk('local')->delete($path);
    }
}
