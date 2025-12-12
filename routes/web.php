<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/show/{limit}', [UserController::class, 'recent']);

Route::get('/show1/{limit}', [CompanyController::class, 'index']);

Route::get('/userbyid/{id}', [UserController::class, 'find']);

Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');

Route::put('/update/{id}', [UserController::class, 'update'])->name('update');

Route::put('/UpPass/{id}', [UserController::class, 'updatepassword'])->name('updatepassword');


// Főoldal
Route::get('/', function () {
    return view('app');
})->name('home');

// Dashboard (bejelentkezett felhasználóknak)
Route::get('/dashboard', function () {
    return view('account');
})->middleware(['auth', 'verified'])->name('dashboard');

// Aláírás generálás
Route::get('/generate', function () {
    return view('generation');
})->name('generate');

// Előző aláírások
Route::get('/signatures', function () {
    return view('old_generations');
})->name('signatures');

// Fiók beállítások
Route::get('/account-settings', function () {
    return view('account_settings');
})->name('account-settings');

// Bejelentkezés
Route::get('/login', function () {
    return view('login');
})->name('login')->middleware('guest');

// Regisztráció
Route::get('/register', function () {
    return view('register');
})->name('register')->middleware('guest');

// Elfelejtett jelszó
Route::get('/forgot-password', function () {
    return view('forgot_password');
})->name('password.request')->middleware('guest');

// Fiók
Route::get('/account', function () {
    return view('account');
})->name('account');








