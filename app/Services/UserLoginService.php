<?php 

namespace App\Services;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Http;

class UserLoginService {

    public function login($email, $password)
    {
        $response = Http::post(env('API_URL') . "login", [
            'email' => $email,
            'password' => $password,
        ]);
        return json_decode($response->body(), true);
    }

    public function register($name,$email,$phone,$password)
    {
        $response = Http::post(env('API_URL') . "register", [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'password' => $password,
        ]);
        return json_decode($response->body(), true);
    }

}


