<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DirectSaleController;
use App\Http\Controllers\PurchasingController;
use App\Http\Controllers\WarehouseProductController;

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

        // Route Manage Role
        Route::get('/manage-role', [RoleController::class, 'index'])->name('manage-role');
        Route::get('/add-role', [RoleController::class, 'addRole'])->name('add-role');
        Route::post('/add-role', [RoleController::class, 'store'])->name('store-role');
        Route::get('/edit-role/{id}', [RoleController::class, 'editRole'])->name('edit-role');
        Route::put('/edit-role/{id}', [RoleController::class, 'update'])->name('update-role');
        Route::delete('/delete-role/{id}', [RoleController::class, 'delete'])->name('delete-role');

        // Route Manage Menu
        // Route::get('/manage-menu', [MenuController::class, 'index'])->name('manage-menu');
        Route::get('/add-menu', [MenuController::class, 'addMenu'])->name('add-menu');
        Route::post('/add-menu', [MenuController::class, 'store'])->name('store-menu');
        Route::get('/edit-menu/{id}', [MenuController::class, 'editMenu'])->name('edit-menu');
        Route::put('/edit-menu/{id}', [MenuController::class, 'update'])->name('update-menu');
        Route::delete('/delete-menu/{id}', [MenuController::class, 'delete'])->name('delete-menu');

        // Route Manage Catalog
        Route::get('/manage-catalog', [ProductController::class, 'index'])->name('manage-catalog');
        Route::get('/add-product', [ProductController::class, 'addProduct'])->name('add-product');
        Route::post('/add-product', [ProductController::class, 'store'])->name('store-product');
        Route::get('/edit-product/{id}', [ProductController::class, 'editProduct'])->name('edit-product');
        Route::put('/edit-product/{id}', [ProductController::class, 'update'])->name('update-product');
        Route::delete('/delete-product/{id}', [ProductController::class, 'delete'])->name('delete-product');

        // Route Manage Warehouse
        Route::get('/manage-warehouse', [WarehouseProductController::class, 'index'])->name('manage-warehouse');
        Route::get('/edit-warehouse-product/{id}', [WarehouseProductController::class, 'editWarehouse'])->name('edit-warehouse-product');
        Route::put('/edit-warehouse-product/{id}', [WarehouseProductController::class, 'update'])->name('edit-warehouse-product');
        
        // Route Manage Stock
        Route::get('/manage-stock', [StockController::class, 'index'])->name('manage-stock');
        Route::get('/add-stock/{id}', [StockController::class, 'addStock'])->name('add-stock');
        Route::post('/add-stock/{id}', [StockController::class, 'store'])->name('store-stock');
        Route::get('/edit-stock/{id}', [StockController::class, 'editStock'])->name('edit-stock');
        Route::put('/edit-stock/{id}', [StockController::class, 'update'])->name('update-stock');

        // Route Manage Purchase
        Route::get('/manage-purchase', [PurchasingController::class, 'index'])->name('manage-purchase');
        Route::get('/add-purchase/{id}', [PurchasingController::class, 'addPurchase'])->name('add-purchase');
        Route::post('/add-purchase/{id}', [PurchasingController::class, 'store'])->name('store-purchase');
        Route::get('/edit-purchase/{id}', [PurchasingController::class, 'editPurchase'])->name('edit-purchase');
        Route::put('/edit-purchase/{id}', [PurchasingController::class, 'update'])->name('update-purchase');

        // Route Manage Delivery
        Route::get('/manage-delivery', function () {
            return view('delivery.index');
        });
        Route::get('/edit-delivery', function () {
            return view('delivery.edit-delivery');
        });

        // Route Manage Direct Sale
        Route::get('/manage-direct-sale', [DirectSaleController::class, 'index'])->name('manage-direct-sale');

        // Route Manage Virtual Sale
        Route::get('/manage-virtual-sale', function () {
            return view('virtual_sale.index');
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