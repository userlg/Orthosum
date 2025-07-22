<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreImageRequest;
use Illuminate\Http\JsonResponse;

class ImageController extends Controller
{
    public function store(StoreImageRequest $request): JsonResponse
    {

        $path = $request->file('image')->store('images', 'public');

        return response()->json([
            'success' => true,
            'message' => 'File uploaded successfully',
            'data' => [
                'file_name' => basename($path),
                'storage_path' => str_replace('\\', '', $path),
            ],
        ], 201, [], JSON_UNESCAPED_SLASHES);
    }
}
