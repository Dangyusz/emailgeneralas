<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Public routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    $users = \App\Models\User::all();
    return view('home', compact('users'));
})->name('home');

Route::view('/app', 'app')->name('app');

// Logout route
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');

// Protected routes
Route::middleware('auth')->group(function () {
    Route::get('/welcome', function () {
        return view('welcome');
    })->name('welcome');

    Route::view('/generation', 'generation')->name('generation');
    Route::view('/old_generations', 'old_generations')->name('old_generations');
    Route::view('/account', 'account')->name('account');
    Route::view('/account_settings', 'account_settings')->name('account_settings');

    // Company routes
    Route::resource('companies', CompanyController::class);

    // Job routes
    Route::resource('jobs', JobController::class);

    // User management routes
    Route::get('/users', function () {
        return view('users.index');
    })->name('users.index');

    Route::get('/users/{id}', function ($id) {
        return view('userbyid', ['id' => $id]);
    })->name('users.show');
});

// Include settings routes
require __DIR__ . '/settings.php';
