<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    public function login()
    {
        $response = Http::post(env('API_URL') . "login", [
            'email' => 'mustafa@email.com',
            'password' => 'kurd12345',
        ]);
        $data = json_decode($response->body(), true);
        Cookie::queue(Cookie::make('token', $data['token'], 50000));
        $user = User::where('email', $data['user']['email'])->first();
        Auth::login($user);
        return back();
    }
}
