<?php

namespace App\Http\Resources\Auth;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'access_token' => $this['access_token'],
            'token_type' => 'Bearer',
            'user' => new UserResource($this['user']),
        ];
    }
}
