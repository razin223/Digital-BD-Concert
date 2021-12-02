<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Socialite;
use Exception;
use App\User;

class GoogleController extends Controller {

    public function redirectToGoogle() {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback() {

        try {



            $user = Socialite::driver('google')->user();



            $finduser = User::where('google_id', $user->id)->first();



            if ($finduser) {



                Auth::login($finduser);



                return redirect('/admin/dashboard');
            } else {

                $Password = str_random(10);





                $newUser = User::create([
                            //'first_name' => $user->user['given_name'],
                            //'last_name' => $user->user['family_name'],
                            'email' => $user->email,
                            'google_id' => $user->id,
                            'password' => bcrypt($Password),
                            'email_verified_at' => date("Y-m-d H:i:s"),
                            'user_type' => 'User',
                            'status' => 'Active'
                ]);



                Auth::login($newUser);



                return redirect('/admin/dashboard');
            }
        } catch (Exception $e) {

            dd($e->getMessage());
        }
    }

}
