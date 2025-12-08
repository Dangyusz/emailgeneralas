<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProbaUserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home' ,["users" => DB::select('select * from users')]);
});

Route::get('/show/{limit}', [UserController::class, 'index']);

Route::get('/show1/{limit}', [CompanyController::class, 'index']);

