<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
      
            $user = Socialite::driver('google')->user();

            $finduser = User::where('email', $user->email)->first();
       
            if($finduser){
       
                Auth::login($finduser);
                return redirect()->intended('/employer-dashboard');
       
            }else{
                $newUser = User::create([
                    'google_id'=> $user['id'],
                    'name' => $user['name'],
                    'first_name' => $user['given_name'],
                    'last_name' => $user['family_name'],
                    'email' => $user['email'],
                    'user_type'=> '2',
                    'password' => Hash::make('963258741')
                ]);
      
                Auth::login($newUser);
      
                return redirect()->intended('/employer-dashboard');
            }
      
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
