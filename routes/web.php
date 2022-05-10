<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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

Route::view('/login', 'login')->name('login');

Route::get('/auth/redirect', function () {
    return Socialite::driver('google')->redirect();
})->name('google-login');
 
Route::get('/auth/callback', function () {
    $googleUser = Socialite::driver('google')->stateless()->user();
    
    $user = User::updateOrCreate([
        'google_id' => $googleUser->getId(),
    ], [
        'name' => $googleUser->getName(),
        'email' => $googleUser->getEmail(),
        'profile_picture' => $googleUser->getAvatar(),
    ]);
 
    Auth::login($user);
 
    return redirect('/home');

})->name('google-callback');

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::view('/home', 'home');
});