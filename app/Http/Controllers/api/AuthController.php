<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->all())) {
            return [
                'message' => 'success',
                'user' => auth()->user(),
                'token' => auth()->user()->createToken('API TOKEN')->plainTextToken,
            ];
        } else {
            return [
                'message' => 'user not exists',
            ];
        }
    }
}
