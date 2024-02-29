<?php


use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Auth\LoginController;

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
Route::prefix('facebook')->name('facebook.')->group(function () {
    Route::get('auth', [App\Http\Controllers\Auth\FaceBookController::class, 'loginUsingFacebook'])->name('auth');
    Route::get('callback', [App\Http\Controllers\Auth\FaceBookController::class, 'callbackFromFacebook'])->name('callback');
    Route::get('delete', [App\Http\Controllers\Auth\FaceBookController::class, 'deleteFacebook'])->middleware(['auth'])->name('delete');
});
Route::prefix('googleauth')->name('googleauth.')->group(function () {
    Route::get('/auth', [App\Http\Controllers\Auth\GoogleController::class, 'redirectGoogle'])->name('auth');
    Route::get('/callback', [App\Http\Controllers\Auth\GoogleController::class, 'calllbackGoogle'])->name('callback');
});

Route::get('home', fn () => view('home'))->middleware(['auth', 'verified'])->name('home');
Route::get('email/verify', [EmailVerificationPromptController::class, '__invoke'])->middleware(['auth'])->name('verification.notice');
Route::post('email/verification-notification', [EmailVerificationNotificationController::class, '__invoke'])->middleware(['auth'])->name('verification.send');
Route::get('email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])->middleware(['auth', 'signed'])->name('verification.verify');


Route::middleware(['role:admin'])->prefix('admin')->group(function () {
    //
    Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.main');
    Route::get('/posts', [App\Http\Controllers\Admin\HomeController::class, 'posts'])->name('admin.posts');
});
