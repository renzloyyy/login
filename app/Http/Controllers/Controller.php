<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function github()
    {
        return Socialite::driver('github')->redirect();
    }
}
