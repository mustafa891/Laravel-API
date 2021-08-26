<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $response = Http::post(env('API_URL') . "login", [
            'email' => $request->email,
            'password' => $request->password,
        ]);
        $data = json_decode($response->body(), true);
        if ($data['message'] == "success") {
            Cookie::queue('token', $data['token'], 15);
            $user = User::where('email', $data['user']['email'])->first();
            Auth::login($user);
            return back();
        }
        return back()->with('error', 'User not found');
    }

    public function logout(Request $request)
    {

        Auth::logout();

        Cookie::queue(
            Cookie::forget('token')
        );
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
