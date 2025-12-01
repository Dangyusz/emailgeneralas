<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;

Route::get('/', function () {
    return Inertia::render('Home', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/generate', function () {
    return Inertia::render('MailGenerator');
})->name('generate');

Route::get('/signatures', function () {
    return Inertia::render('Signatures');
})->name('signatures');

Route::get('/account-settings', function () {
    return Inertia::render('AccountSettings');
})->name('account-settings');

require __DIR__.'/settings.php';
