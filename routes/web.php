<?php

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('home', fn () => view('home'))->middleware(['auth', 'verified'])->name('home');
Route::get('email/verify', fn () => view('auth.verify-email'))->middleware(['auth'])->name('verification.notice');
Route::post('email/verification-notification', function (Request $request) {
    $request->user()->SendEmailVerificationNotification();

    return back()->with('message', 'Verification notification is send');
})->middleware(['auth'])->name('verification.send');

Route::get('email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect()->intended(RouteServiceProvider::HOME);
})->middleware(['auth', 'signed'])->name('verification.verify');
