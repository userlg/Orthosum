<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreImageRequest;
use App\Services\StoreService;
use Illuminate\Http\JsonResponse;

class ImageController extends Controller
{
    public function store(StoreImageRequest $request, StoreService $storeService): JsonResponse
    {
        $file = $request->file('image');

        $storeService->store($file, $request->width, $request->height);

        return response()->json([
            'success' => true,
        ], 201);
    }
}
