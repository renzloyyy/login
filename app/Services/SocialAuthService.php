<?php

namespace App\Services;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SocialAuthService
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->with(['prompt' => 'login'])->redirect();
    }

    public function handleProviderCallback($provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->user();
            $email = strtolower($socialUser->getEmail());

            $user = User::where('email', $email)->first();

            if (!$user) {
                // Create a new user if not found
                $user = User::create([
                    'name' => $socialUser->getName() ?? $socialUser->getNickname(),
                    'email' => $socialUser->getEmail(),
                    "{$provider}_id" => $socialUser->getId(),
                    'avatar' => $socialUser->getAvatar(),
                    'password' => bcrypt(uniqid()),
                    'auth_method' => $provider,
                ]);
            } else {
                // Update the user's auth method and provider ID
                $user->{$provider . '_id'} = $socialUser->getId();
                $user->auth_method = $provider;
                $user->save();
            }

            // Log the user in
            Auth::login($user, true);

            // Log the authentication attempt
            Log::info("User logged in via {$provider}", [
                'user_id' => $user->id,
                'email' => $user->email,
                'auth_method' => $user->auth_method,
                'time' => now(),
            ]);

            return redirect('/dashboard');
        } catch (\Exception $e) {
            return redirect('/')->with('error', ucfirst($provider) . ' login failed. ' . $e->getMessage());
        }
    }

}
