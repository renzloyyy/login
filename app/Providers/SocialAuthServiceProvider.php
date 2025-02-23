<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SocialAuthServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('SocialAuth', function ($app) {
            return new \App\Services\SocialAuthService();
        });
    }

    public function boot()
    {
        //
    }
}
