<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Services\SocialAccountService;

class SocialAuthController extends Controller
{
    public function redirect($social)
    {
        return Socialite::driver($social)->redirect();
    }

    public function callback($social)
    {
        $user = SocialAccountService::createOrGetUser(Socialite::driver($social)->user(), $social);
//        $user = Socialite::driver($social)->user();
        dd($user);
        auth()->login($user);

        return redirect()->route('client.homepage');
    }
}
