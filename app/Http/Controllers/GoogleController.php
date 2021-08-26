<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;
use Laravel\Socialite\Facades\Socialite;
use Mockery\Expectation;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $finduser = User::where('google_id', $user->id)->first();
            if ($finduser) {
                $token = $finduser->createToken('API TOKEN')->plainTextToken;
                Cookie::queue('token', $token, 15);
                Auth::login($finduser);
                return redirect('/');
            } else {
                return redirect('/image/create');
            }
        } catch (Expectation $e) {

            dd($e->getMessage());
        }
    }
}
