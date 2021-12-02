<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Socialite;
use Exception;
use App\User;

class FacebookController extends Controller {

    public function redirectToFacebook() {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback() {
        $user = Socialite::driver('facebook')->fields([
                    'first_name',
                    'last_name',
                    'email',
                    'id'
                ])->user();
        $finduser = User::where('facebook_id', $user->id)->first();

        if ($finduser) {
            Auth::login($finduser);
            return redirect('/admin/dashboard');
        } else {

            $Password = str_random(10);
            $newUser = User::create([
                        'first_name' => $user->user['first_name'],
                        'last_name' => $user->user['last_name'],
                        'email' => $user->email,
                        'facebook_id' => $user->id,
                        'password' => bcrypt($Password),
                        'email_verified_at' => date("Y-m-d H:i:s"),
                        'user_type' => 'User',
                        'status' => 'Active'
            ]);

            Auth::login($newUser);

            return redirect('/admin/dashboard');
        }
    }

}
