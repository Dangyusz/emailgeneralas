<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/show/{limit}', [UserController::class, 'recent']);

Route::get('/show1/{limit}', [CompanyController::class, 'index']);

Route::get('/userbyid/{id}', [UserController::class, 'find']);

Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');

Route::put('/update/{id}', [UserController::class, 'update'])->name('update');




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

// Bejelentkezés

// Regisztráció
Route::get('/register', function () {
    return view('register');
})->name('register')->middleware('guest');



// Fiók
Route::get('/account/{id}', [UserController::class, 'find']);

// Fiók beállítások
Route::get('/', function () {
    return view('account_settings');
})->name('account-settings');


Route::get('/account_settings/{id}', [UserController::class, 'edit'])->name('edit');




Route::post('/store', [UserController::class, 'store']);




Route::view('/login', 'login')->middleware('guest')->name('login');

Route::post('/login', LoginController::class)->middleware('guest');




Route::get('/forgot_password', function () {
    return view('forgot_password');
})->name('forgot_password');


Route::put('/forgot_password', [UserController::class, 'updatepassword'])->name('updatepassword');


    



