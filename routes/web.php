<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\SmsController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// public
Route::get('/', [ImageController::class, 'index']);

Route::get('login', function () {
    return Redirect('/');
})->name('login');

Route::post('login', [AuthController::class, 'login'])->middleware('guest')->name('login');
Route::post('register', [AuthController::class, 'register'])->middleware('guest')->name('register');
Route::post('/verifiy_reg', [AuthController::class, 'complete_register'])->name('verifiy_reg');
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// google login 
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::group(['middleware' => 'auth', 'prefix' => 'image', 'as' => 'image.'], function () {
    Route::get('create', [ImageController::class, 'create'])->name('create');
    Route::post('store', [ImageController::class, 'store'])->name('store');
});
