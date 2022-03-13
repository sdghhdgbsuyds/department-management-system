<?php

use App\Http\Controllers\Auth\AccountController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::middleware('auth')->group(function () {

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});

Route::get('login/steam', function () {
    return Socialite::driver('steam')->redirect();
})->name('auth.steam');

Route::get('login/discord', function () {
    return Socialite::driver('discord')->redirect();
})->name('auth.discord');

Route::get('login/discord/handle', function () {
    $user = Socialite::driver('discord')->user();

    // All providers...
    $userInfo = $user->getId() . ' ' .
        $user->getNickname() . ' ' .
        $user->getName() . ' ' .
        $user->getAvatar();

    session(['user_info' => $userInfo]);

    return session('user_info');
});

Route::get('/login/steam/handle', [LoginController::class, 'steam']);
Route::get('/account/create', [AccountController::class, 'create'])->name('auth.account.create');

Route::get('/account/show', [AccountController::class, 'show'])->name('auth.account.show');

Route::post('/account', [AccountController::class, 'store'])->name('auth.account.store');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
