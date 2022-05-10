<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\WheatherController;

Route::view('/login', 'login')->name('login');

Route::get('/auth/redirect', [SocialController::class, 'redirect'])->name('google-login');
Route::get('/auth/callback', [SocialController::class, 'callback'])->name('google-callback');

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/home', [WheatherController::class, 'index'])->name('wheather');
});