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

// Route Manage Users
Route::get('/manage-user', function () {
    return view('users.index');
});
Route::get('/add-user', function () {
    return view('users.add-user');
});
Route::get('/edit-user', function () {
    return view('users.edit-user');
});

// Route Manage Role & Access
Route::get('/manage-role', function () {
    return view('roles.index');
});
Route::get('/add-role', function () {
    return view('roles.add-role');
});
Route::get('/edit-role', function () {
    return view('roles.edit-role');
});
