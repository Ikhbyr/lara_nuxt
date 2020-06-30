<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Http\Resources\User as UserResource;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserLoginRequest;
class AuthController extends Controller{
    public function register(UserRegisterRequest $request) {

        $user = User::create([
            'email' => $request->email,
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'password' => bcrypt($request->password),
        ]);

        if (!$token = auth()->attempt($request->only(['email','password']))){
            return abort(401);
        };
        return (new UserResource($request->user()))->additional([
            'meta' => [
                'token' => $token,
            ],
        ]);
    }
    public function login(UserLoginRequest $request) {
        if (!$token = auth()->attempt($request->only(['email','password']))){
            return response()->json([
                'errors' => [
                    'email' => ['Уучлаарай, ийм бүртгэлтэй хэрэглэгч олдсонгүй.'],
                ],
            ], 422);
        };
        return (new UserResource($request->user()))->additional([
            'meta' => [
                'token' => $token,
            ],
        ]);
    }

    public function user(Request $request) {
        return new UserResource($request->user());
    }

    public function logout() {
        auth() -> logout();
    }
}
