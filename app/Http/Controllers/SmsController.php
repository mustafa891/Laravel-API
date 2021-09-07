<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\TestNotifiy;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Nexmo\Laravel\Facade\Nexmo;

class SmsController extends Controller
{
    public function index()
    {
        $nexmo = app('Nexmo\Client');

        $nexmo->message()->send([
            'to'   => '+96407507488167',
            'from' => '16105552344',
            'text' => 'Using the instance to send a message.'
        ]);
    //    Notification::send(User::first(), new TestNotifiy());
    }
}
