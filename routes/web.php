<?php

use Illuminate\Support\Facades\Route;

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

// Route Authentication
Route::get('/', function () {
    return view('auth.login');
});
Route::get('/register', function () {
    return view('auth.register');
});
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
});

// Route Dashboard
Route::get('/dashboard', function () {
    return view('index');
});

// Route Users Management
Route::get('/list-user', function () {
    return view('users.index');
});
Route::get('/add-user', function () {
    return view('users.add-user');
});
Route::get('/edit-user', function () {
    return view('users.edit-user');
});
