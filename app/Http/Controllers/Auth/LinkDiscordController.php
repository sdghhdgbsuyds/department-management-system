<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LinkDiscordController extends Controller
{
    public function discord()
    {
        $user = Socialite::driver('discord')->user();

        $loginUser = Auth::user()->update([
            'discord_id' => $user->getId(),
            'discord_name' => $user->getNickname()
        ]);

        return redirect()->route('auth.account.show', Auth::user()->steam_hex)->with('success', 'Linked Discord Successful');
    }
}
