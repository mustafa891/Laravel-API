<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImageController;
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
    return back();
})->name('login');

Route::post('login', [AuthController::class, 'login'])->middleware('guest')->name('login');

Route::group(['middleware' => 'auth', 'prefix' => 'image', 'as' => 'image.'], function () {
    Route::get('create', [ImageController::class, 'create'])->name('create');
    Route::post('store', [ImageController::class, 'store'])->name('store');
});
