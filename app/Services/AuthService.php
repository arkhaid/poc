<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Contracts\User;

class AuthService {

    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function authorizeWithGoogle(User $socialiteUser)
    {
        $user = $this->userRepository->findByGoogleId($socialiteUser->id);


        if (!$user){
            $normalized = [
                'first_name' => $socialiteUser->user['given_name'],
                'last_name' => $socialiteUser->user['family_name'],
                'email' => $socialiteUser->email,
                'google_id'=> $socialiteUser->id,
                'profile_picture'=> $socialiteUser->avatar,
                'status'=> 'active',
            ];
            $user = $this->userRepository->create($normalized);
        }

        Auth::login($user);

        $user->tokens()->delete();
        $token = $user->createToken('api');

        return $token->plainTextToken;
        
    }
}
