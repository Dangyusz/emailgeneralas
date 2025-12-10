<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home' ,["users" => DB::select('select * from users')]);
});

Route::get('/show/{limit}', [UserController::class, 'recent']);

Route::get('/show1/{limit}', [CompanyController::class, 'index']);

Route::get('/userbyid/{id}', [UserController::class, 'find']);

Route::post('/store', [UserController::class,'store']);
