<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;


Route::get('/', function () {
    return view('welcome');
})->name('homepage');

Route::get('dashboard',[\App\Http\Controllers\DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

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
    Route::get('update-nid', [ProfileController::class, 'showUpdatenidForm'])->name('update-nid');
    Route::post('update-pnid', [ProfileController::class, 'Update_nid'])->name('edit-nid');
    Route::post('delete-account', [ProfileController::class, 'destroy'])->name('delete-account');
});

Route::middleware('admin')->group(function () {
    Route::get('admin-panel', [\App\Http\Controllers\AdminController::class,'index'])->name('admin-panel');

    Route::get('transport-panel', function() {
        return view('auth.admin-panel-transports');
    })->name('transport-panel');

    Route::get('routes-panel', function() {
        return view('auth.admin-panel-routes');
    })->name('routes-panel');

    Route::get('ports-panel', function() {
        return view('auth.admin-panel-ports');
    })->name('ports-panel');

    Route::resource('notices',\App\Http\Controllers\NoticeController::class);
    Route::resource('airplanes',\App\Http\Controllers\AirplaneController::class);
    Route::resource('airports',\App\Http\Controllers\AirportController::class);
    Route::resource('air_routes',\App\Http\Controllers\AirRouteController::class);
    Route::resource('buses',\App\Http\Controllers\BusController::class);
    Route::resource('bus_routes',\App\Http\Controllers\BusRouteController::class);
    Route::resource('bus_stops',\App\Http\Controllers\BusstopController::class);
    Route::resource('rails',\App\Http\Controllers\RailController::class);
    Route::resource('rail_routes',\App\Http\Controllers\RailRouteController::class);
    Route::resource('railstations',\App\Http\Controllers\RailstationController::class);
    Route::resource('locations', \App\Http\Controllers\LocationController::class);

});
Route::get('notice/{notice}', [\App\Http\Controllers\NoticeController::class, 'show'])->name('notices.show')->middleware('auth');
Route::get('/login/google', [\App\Http\Controllers\Auth\GoogleController::class, 'redirectToGoogle'])->name('google-login');
Route::get('/login/google/callback', [\App\Http\Controllers\Auth\GoogleController::class, 'handleGoogleCallback']);



