<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{

    public function steam()
    {
        $steamUser = Socialite::driver('steam')->user();

        if (!is_null($steamUser)) {
            $user = $this->findOrNewUser($steamUser->getId());

            if (!$user) {
                return redirect()->route('auth.account.create');
                die();
            }

            Auth::login($user, true);

            $user->last_login = date("Y-m-d H:i:s");
            $user->save();

            return redirect()->intended('account/show/' . $user->steam_hex)->with('success', 'Welcome Back!'); // redirect to site
        }

        return $this->redirectToSteam();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->forget(['steam_hex', 'steam_id']);

        if (session('success')) {
            return redirect()->route('home')->with('success', session('success'));
        }

        return redirect()->route('home')->with('success', 'You have logged out!');
    }

    protected function findOrNewUser($steamId)
    {
        $user = User::where('steam_hex', User::dec2hex($steamId))->first();

        if (!is_null($user)) {
            return $user;
        }

        session([
            'steam_hex' => User::dec2hex($steamId),
            'steam_id' => $steamId,
        ]);

        return false;
    }
}
