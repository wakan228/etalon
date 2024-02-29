<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class FaceBookController extends Controller
{
    /**
     * Login Using Facebook
     */
    public function loginUsingFacebook()
    {
        //dd(Socialite::driver('facebook')->redirect());
        return Socialite::driver('facebook')->redirect();
    }

    public function callbackFromFacebook()
    {
        try {
            $user = Socialite::driver('facebook')->user();

            $this->regOrLogin($user);
            return redirect('home');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function regOrLogin($user)
    {
        $user_base = User::where('email', $user->email)->first();
        if (empty($user_base)) {
            $user_base = User::create([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'password' => Hash::make(Str::random(60)),
            ]);
            $user_base->assignRole('user');
            $user_base->markEmailAsVerified();
        }
        Auth::login($user_base);
    }

    public function deleteFacebook()
    {
        //dd(Socialite::driver('facebook')->redirect());
        return Auth::user()->email;
    }
}
