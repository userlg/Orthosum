<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Resources\UserResource;
use App\Http\Resources\Collection\UserCollection;

class UserController extends Controller
{
    public function register(RegisterUserRequest $request): UserResource
    {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return new UserResource($user);
    }

    public function getUsers(): UserCollection
    {
        $users = User::all();

        return new UserCollection($users);
    }
}
