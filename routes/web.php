<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;

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
})->name('homepage');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('confirm-password', [PasswordController::class, 'show'])->name('password.confirm');
    Route::post('confirm-password', [PasswordController::class, 'store']);
    Route::put('password', [PasswordController::class, 'update'])->name('password.update');
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    Route::get('profile', [ProfileController::class, 'info_update'])->name('edit-profile');
    Route::get('update-profile', [ProfileController::class, 'edit'])->name('profile');
    Route::get('update-contact', [ProfileController::class, 'showUpdateContactForm'])->name('update-contact');
    Route::post('update-contact', [ProfileController::class, 'UpdateContact'])->name('edit-contact');
    Route::get('update-passport', [ProfileController::class, 'showUpdatePassportForm'])->name('update-passport');
    Route::post('update-passport', [ProfileController::class, 'UpdatePassport'])->name('edit-passport');
    Route::post('delete-account', [ProfileController::class, 'destroy'])->name('delete-account');
});

Route::middleware('admin')->group(function () {
    Route::get('admin-panel', [\App\Http\Controllers\AdminController::class,'index'])->name('admin-panel');
});

Route::get('/login/google', [\App\Http\Controllers\Auth\GoogleController::class, 'redirectToGoogle'])->name('google-login');
Route::get('/login/google/callback', [\App\Http\Controllers\Auth\GoogleController::class, 'handleGoogleCallback']);


