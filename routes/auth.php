<?php

use App\Http\Controllers\Apply\ApplicationController;
use App\Http\Controllers\Auth\AccountController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\LinkDiscordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::middleware('auth')->group(function () {
    Route::get('login/discord', function () {
        return Socialite::driver('discord')->redirect();
    })->name('auth.discord');

    Route::get('login/discord/handle', [LinkDiscordController::class, 'discord']);

    Route::view('account/link/discord', 'auth.account.link-discord')->name('account.link.discord');
});

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('login/steam', function () {
    return Socialite::driver('steam')->redirect();
})->name('auth.steam');

Route::get('/login/steam/handle', [LoginController::class, 'steam']);

Route::group(['middleware' => 'new_account_check'], function () {
    Route::get('/account/create', [AccountController::class, 'create'])->name('auth.account.create');
    Route::post('/account', [AccountController::class, 'store'])->name('auth.account.store');
});
