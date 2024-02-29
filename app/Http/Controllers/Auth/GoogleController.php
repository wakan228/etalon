<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class GoogleController extends Controller
{
    public function redirectGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function calllbackGoogle()
    {
        $user = Socialite::driver('google')->user();

        $this->regOrLogin($user);
        return redirect('home');
    }
    public function regOrLogin($user)
    {
        $user_base = User::where('email', $user->email)->first();
        if (empty($user_base)) {
            $user_base = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'password' => Hash::make(Str::random(60)),
            ]);
            $user_base->assignRole('user');
            $user_base->markEmailAsVerified();
        }
        Auth::login($user_base);
    }
}
