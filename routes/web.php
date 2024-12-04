<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

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

Route::middleware(['preventback'])->group(function () {
// Route Authentication
    Route::get('/', [LoginController::class, 'showLogin'])->middleware('guest');
    Route::post('/', [LoginController::class, 'login'])->name('login')->middleware('guest');

    Route::middleware(['auth'])->group(function () {
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

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
        Route::get('/manage-user', [UserController::class, 'index'])->name('manage-user');
        Route::get('/add-user', [UserController::class, 'addUser'])->name('add-user');
        Route::post('/add-user', [UserController::class, 'store'])->name('store-user');
        Route::get('/edit-user/{id}', [UserController::class, 'editUser'])->name('edit-user');
        Route::put('/edit-user/{id}', [UserController::class, 'update'])->name('update-user');
        Route::delete('/delete-user/{id}', [UserController::class, 'delete'])->name('delete-user');

        // Route Manage Role & Access
        Route::get('/manage-role', [RoleController::class, 'index'])->name('manage-role');
        Route::get('/add-role', [RoleController::class, 'addRole'])->name('add-role');
        Route::post('/add-role', [RoleController::class, 'store'])->name('store-role');
        Route::get('/edit-role/{id}', [RoleController::class, 'editRole'])->name('edit-role');
        Route::put('/edit-role/{id}', [RoleController::class, 'update'])->name('update-role');
        Route::delete('/delete-role/{id}', [RoleController::class, 'delete'])->name('delete-role');

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

        // Route Manage Warehouse
        Route::get('/manage-warehouse', function () {
            return view('warehouse.index');
        });
        Route::get('/add-warehouse-quantity', function () {
            return view('warehouse.add-warehouse-quantity');
        });
        Route::get('/edit-warehouse-quantity', function () {
            return view('warehouse.edit-warehouse-quantity');
        });

        // Route Manage Purchase
        Route::get('/manage-purchase', function () {
            return view('purchase.index');
        });
        Route::get('/add-purchase-quantity', function () {
            return view('purchase.add-purchase-quantity');
        });
        Route::get('/edit-purchase-quantity', function () {
            return view('purchase.edit-purchase-quantity');
        });

        // Route Manage Delivery
        Route::get('/manage-delivery', function () {
            return view('delivery.index');
        });
        Route::get('/edit-delivery', function () {
            return view('delivery.edit-delivery');
        });

        // Route Sales & Transactions
        Route::get('/manage-pos', function () {
            return view('pos.index');
        });

        // Route Reports & Analytics
        Route::get('/manage-report', function () {
            return view('report.index');
        });
        Route::get('/detail-report', function () {
            return view('report.detail-report');
        });
        Route::get('/edit-report', function () {
            return view('report.edit-report');
        });

        // Route Bookstore
        Route::get('/landing-page', function () {
            return view('bookstore.index');
        });
        Route::get('/bookstore', function () {
            return view('bookstore.bookstore');
        });
        Route::get('/order-history', function () {
            return view('bookstore.order-history');
        });
    });
});