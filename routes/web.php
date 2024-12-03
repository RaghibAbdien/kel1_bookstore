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

// Route Manage Catalog
Route::get('/manage-catalog', function () {
    return view('catalog.index');
});
Route::get('/add-product', function () {
    return view('catalog.add-product');
});
Route::get('/edit-product', function () {
    return view('catalog.edit-product');
});

// Route Manage Stock
Route::get('/manage-stock', function () {
    return view('stock.index');
});
Route::get('/add-quantity', function () {
    return view('stock.add-quantity');
});
Route::get('/edit-quantity', function () {
    return view('stock.edit-quantity');
});