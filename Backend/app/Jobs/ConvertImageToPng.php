<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ConvertImageToPng implements ShouldQueue
{
    use Queueable;

    protected string $path;
    protected int $width;
    protected int $height;

    public function __construct(string $path, int $width, int $height)
    {
        $this->path = $path;
        $this->width = $width;
        $this->height = $height;
    }


    public function handle(): void
    {
        $imagePath = storage_path('app/' . $this->path);
        if (!file_exists($imagePath)) {
            logger()->error("Image not found: {$imagePath}");
            return;
        }

        // Procesar la imagen
        $image = Image::make($imagePath)
            ->resize($this->width, $this->height, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })
            ->contrast(20) // mejora el contraste (ajusta entre -100 a 100)
            ->encode('png', 100);

        // Generar ruta destino
        $outputPath = str_replace(pathinfo($this->path, PATHINFO_EXTENSION), 'png', $this->path);

        // Guardar
        Storage::put($outputPath, (string) $image);

        logger()->info("Imagen convertida y guardada en: {$outputPath}");
    }
}
