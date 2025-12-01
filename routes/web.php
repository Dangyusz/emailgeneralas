<?php
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', function () {
    // Fetch all users from the database
    $users = User::all();

    // Pass $users to the Blade view resources/views/users/index.blade.php
    return view('users.index', ['users' => $users]);
});
