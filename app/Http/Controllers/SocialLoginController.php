<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;


class SocialLoginController extends Controller
{
    public function gotogoogle(){
        return Socialite::driver('google')->redirect();
    }
    public function apigstore(){
        $socialuser = Socialite::driver('google')->user();
        $user = User::where('email', $socialuser->email)->first();

        if($user == null){
            $store = new User();
            $store->username = $socialuser->name;
            $store->email = $socialuser->email;
            $store->name = $socialuser->name;
            $store->number = $socialuser->name;
            $store->password = Hash::make($socialuser->name);

            $store->save();
            Auth::login($store);

            return redirect(RouteServiceProvider::HOME);
        }
        else{
            Auth::login($user);

            return redirect(RouteServiceProvider::HOME);
        }
    }
}
