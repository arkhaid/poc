<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{

    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService= $authService;
    }

    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $user = Socialite::driver('google')->stateless()->user();
    
        $token = $this->authService->authorizeWithGoogle($user);

        return redirect('/home')->with('token',  $token);
    }
}