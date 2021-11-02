<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LinkedInController extends Controller
{
    public function redirectToLinkedin()
    {
        return Socialite::driver('linkedin')->redirect();
    }

    public function handleLinkedinCallback()
    {
        try {
    
            $user = Socialite::driver('linkedin')->user();
     
            $finduser = User::where('email', $user->email)->first();
     
            if($finduser){
     
                Auth::login($finduser);
    
                return redirect()->intended('/employer-dashboard');
     
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'first_name' => $user->first_name,
                    'last_name' => $user->last_name,
                    'linkedin_id'=> $user->id,
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
