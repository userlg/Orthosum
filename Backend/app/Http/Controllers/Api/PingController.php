<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use OpenApi\Annotations as OA;



/**
 * @OA\Info(
 *     title="OrthoSum API",
 *     version="1.0.0",
 *     description="Swagger Laravel API documentation for OrthoSum",
 * )
 */


class PingController extends Controller
{

    /**
     * @OA\Get(
     *     path="/api/v1/ping",
     *     summary="Check if API is alive",
     *     tags={"Ping"},
     *     @OA\Response(
     *         response=200,
     *         description="When the API is alive, it returns a 'pong' message.",
     *     )
     * )
     */

    public function ping(): JsonResponse
    {
        return response()->json(['message' => 'pong'], 200);
    }
}
