<?php

namespace App\Http\Controllers;

use App\SocialAccountService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{

    public function redirect(){
        return Socialite::driver('facebook')->redirect();
    }


    public function callback(SocialAccountService $service)
    {
        $user = $service->createOrGetUser(Socialite::driver('facebook')->stateless()->user());
        Auth::login($user,true);
        return redirect('blog.index')
            ->with('message', 'You have signed in with Facebook.');
        //$providerUser = Socialite::driver('facebook')->user();
    }

//
}
