<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\Auth\UserResource;
use App\User;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterRequest $request) {
        $request['password'] = Hash::make($request->password);
        $user = new User($request->all());
        $user->save();
        $user['token'] = $user->createToken('authToken')->accessToken;
        return new UserResource($user);
    }

    public function login(LoginRequest $request) {
        if(!auth()->attempt($request->all())) {
            return response([
                'errors' => 'Account or password is incorrect'
            ],Response::HTTP_UNAUTHORIZED);
        }
        auth()->user()['token'] = auth()->user()->createToken('authToken')->accessToken;
        return new UserResource(auth()->user());
    }

}
