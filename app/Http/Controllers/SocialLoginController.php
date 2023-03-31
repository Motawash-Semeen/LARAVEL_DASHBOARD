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
            $email = $socialuser->email;

            $store->save();
            return view('auth.setpassword' ,compact("email"));

            // Auth::login($store);

            // return redirect(RouteServiceProvider::HOME);
        }
        else{
            Auth::login($user);

            return redirect(RouteServiceProvider::HOME);
        }
    }

    function updatepass(Request $request, $email){
        $user = User::where("email", $email)->first();
        $user->password = Hash::make($request->password);

        $user->update();

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
