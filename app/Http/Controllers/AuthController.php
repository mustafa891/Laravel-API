<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ActiveCode;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\UserLoginService;
use App\Http\Requests\LoginRequest;
use App\Notifications\VerifiyNotifiy;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    public function login(LoginRequest $request, UserLoginService $UserLoginService)
    {
        $response = $UserLoginService->login($request->email, $request->password);        

        if ($response['message'] == "success") {
            Cookie::queue('token', $response['token'], 15);
            $user = User::where('email', $response['user']['email'])->first();
            Auth::login($user);
            return back();
        }
        return back()->with('error', 'User not found');
    }

    public function register(Request $request)
    { 
        $fields = $this->fields();
        $code = Str::random(6);
        $this->GenereateCode($fields, $code);
        Notification::route('mail', [
            $fields['email'],
        ])->notify(new VerifiyNotifiy($code));
        session()->put('user', $fields);
        return back()->with('two_factory', $fields);
    }


    public function complete_register(Request $request)
    {
        $fields = session('user');
         $Active =  ActiveCode::where('email', $fields['email'])->first();
        if ($request->code == $Active->code) {
            $Active->delete();
            $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'phone' => $fields['phone'],
            'password' => Hash::make($fields['password']),
        ]);

        $token = $user->createToken('API TOKEN')->plainTextToken;
        Cookie::queue('token', $token, 15);

        Auth::login($user);
        return back();

        }else {
            
       }
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

    public function fields()
    {
        return request()->validate([
            'name' => ['required'],
             'email' => ['required', 'email'],
             'phone' => ['required'],
             'password' => ['required', 'confirmed'],
        ]);
    }


    public function GenereateCode($fields, $code)
    {
        $actives = ActiveCode::where('email', request()->email)->get();
        $actives->map(function($code) {
            $code->delete();
        });
        ActiveCode::create(['email' => $fields['email'], 'code' => $code]);
    }
}
