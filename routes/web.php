<?php

use App\Models\TaxAndDiscount;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BookstoreController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DirectSaleController;
use App\Http\Controllers\PurchasingController;
use App\Http\Controllers\VirtualSaleController;
use App\Http\Controllers\DeliveryOrderController;
use App\Http\Controllers\TaxAndDiscountController;
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
    Route::middleware(['guest'])->group(function () {
        Route::get('/', [LoginController::class, 'showLogin']);
        Route::post('/', [LoginController::class, 'login'])->name('login');
        Route::get('/register', [LoginController::class, 'showRegister'])->name('show-register');
        Route::post('/register', [LoginController::class, 'register'])->name('register');
        Route::get('/forgot-password', [LoginController::class, 'forgotPassword'])->name('forgot-password');
    });

    Route::middleware(['auth'])->group(function () {
        // Route Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('role.access:dashboard');
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

        // Route Manage Users
        Route::middleware(['role.access:dashboard', 'admin'])->group(function () {
            Route::get('/manage-user', [UserController::class, 'index'])->name('manage-user');
            Route::get('/add-user', [UserController::class, 'addUser'])->name('add-user');
            Route::post('/add-user', [UserController::class, 'store'])->name('store-user');
            Route::get('/edit-user/{id}', [UserController::class, 'editUser'])->name('edit-user');
            Route::put('/edit-user/{id}', [UserController::class, 'update'])->name('update-user');
            Route::delete('/delete-user/{id}', [UserController::class, 'delete'])->name('delete-user');
        });

        // Route Manage Role
        Route::middleware(['role.access:dashboard', 'admin'])->group(function () {
            Route::get('/manage-role', [RoleController::class, 'index'])->name('manage-role');
            Route::get('/add-role', [RoleController::class, 'addRole'])->name('add-role');
            Route::post('/add-role', [RoleController::class, 'store'])->name('store-role');
            Route::get('/edit-role/{id}', [RoleController::class, 'editRole'])->name('edit-role');
            Route::put('/edit-role/{id}', [RoleController::class, 'update'])->name('update-role');
            Route::delete('/delete-role/{id}', [RoleController::class, 'delete'])->name('delete-role');
        });

        // Route Manage Menu
        Route::middleware(['role.access:dashboard', 'admin'])->group(function () {
            Route::get('/manage-menu', [MenuController::class, 'index'])->name('manage-menu');
            Route::get('/add-menu', [MenuController::class, 'addMenu'])->name('add-menu');
            Route::post('/add-menu', [MenuController::class, 'store'])->name('store-menu');
            Route::get('/edit-menu/{id}', [MenuController::class, 'editMenu'])->name('edit-menu');
            Route::put('/edit-menu/{id}', [MenuController::class, 'update'])->name('update-menu');
            Route::delete('/delete-menu/{id}', [MenuController::class, 'delete'])->name('delete-menu');
        });

        // Route Manage Catalog
        Route::middleware(['role.access:dashboard', 'headManager'])->group(function () {
            Route::get('/manage-catalog', [ProductController::class, 'index'])->name('manage-catalog');
            Route::get('/add-product', [ProductController::class, 'addProduct'])->name('add-product');
            Route::post('/add-product', [ProductController::class, 'store'])->name('store-product');
            Route::get('/edit-product/{id}', [ProductController::class, 'editProduct'])->name('edit-product');
            Route::put('/edit-product/{id}', [ProductController::class, 'update'])->name('update-product');
            Route::delete('/delete-product/{id}', [ProductController::class, 'delete'])->name('delete-product');
        });

        // Route Manage Warehouse
        Route::middleware(['role.access:dashboard', 'logisticManager'])->group(function () {
            Route::get('/manage-warehouse', [WarehouseProductController::class, 'index'])->name('manage-warehouse');
            Route::get('/edit-warehouse-product/{id}', [WarehouseProductController::class, 'editWarehouse'])->name('edit-warehouse-product');
            Route::put('/edit-warehouse-product/{id}', [WarehouseProductController::class, 'update'])->name('update-warehouse-product');
        });
        
        // Route Manage Stock
        Route::middleware(['role.access:dashboard', 'storeManager'])->group(function () {
            Route::get('/manage-stock', [StockController::class, 'index'])->name('manage-stock');
            Route::get('/add-stock/{id}', [StockController::class, 'addStock'])->name('add-stock');
            Route::post('/add-stock/{id}', [StockController::class, 'store'])->name('store-stock');
            Route::get('/edit-stock/{id}', [StockController::class, 'editStock'])->name('edit-stock');
            Route::put('/edit-stock/{id}', [StockController::class, 'update'])->name('update-stock');
        });

        // Route Manage Purchase
        Route::middleware(['role.access:dashboard', 'purchasingAgent'])->group(function () {
            Route::get('/manage-purchase', [PurchasingController::class, 'index'])->name('manage-purchase');
            Route::get('/add-purchase/{id}', [PurchasingController::class, 'addPurchase'])->name('add-purchase');
            Route::post('/add-purchase/{id}', [PurchasingController::class, 'store'])->name('store-purchase');
            Route::get('/edit-purchase/{id}', [PurchasingController::class, 'editPurchase'])->name('edit-purchase');
            Route::put('/edit-purchase/{id}', [PurchasingController::class, 'update'])->name('update-purchase');
        });

        // Route Manage Tax And Discount
        Route::middleware(['role.access:dashboard', 'headManager'])->group(function () {
            Route::get('/manage-global-pricing', [TaxAndDiscountController::class, 'index'])->name('manage-global-pricing');
            Route::put('/edit-tax/{id}', [TaxAndDiscountController::class, 'updateTax'])->name('update-tax');
            Route::put('/edit-shiping/{id}', [TaxAndDiscountController::class, 'updateShiping'])->name('update-shiping');
            Route::put('/edit-discount/{id}', [TaxAndDiscountController::class, 'updateDiscount'])->name('update-discount');
        });

        // Route Manage Direct Sale
        Route::middleware(['role.access:dashboard', 'cashier'])->group(function () {
            Route::get('/manage-direct-sale', [DirectSaleController::class, 'index'])->name('manage-direct-sale');
            Route::post('/add-payment', [PaymentController::class, 'store'])->name('store-payment');
            Route::get('/show-direct-invoice/{id}', [PaymentController::class, 'showInvoice'])->name('show-direct-invoice');
        });
        
        // Route Manage Virtual Sale
        Route::middleware(['role.access:dashboard', 'customerService'])->group(function () {
            Route::get('/manage-virtual-sale', [VirtualSaleController::class, 'index'])->name('manage-virtual-sale');
            Route::get('/show-virtual-invoice/{id}', [VirtualSaleController::class, 'showInvoice'])->name('show-virtual-invoice');
            Route::post('/confirm-virtual-invoice/{id}', [VirtualSaleController::class, 'confirmInvoice'])->name('confirm-virtual-invoice');
        });
        
        // Route Reports & Analytics
        Route::get('/manage-report', [ReportController::class, 'index'])->name('manage-report');
        Route::get('/detail-report/{id}', [ReportController::class, 'detailReport'])->name('detail-report');

        // Route Bookstore
        Route::middleware(['customer'])->group(function () {
            Route::get('/landing-page', [BookstoreController::class, 'index'])->name('landing-page');
            Route::get('/bookstore', [BookstoreController::class, 'bookstore'])->name('show-bookstore');
            Route::get('/order-history', [BookstoreController::class, 'orderHistory'])->name('show-order-history');
            // Route Bookstore Payment
            Route::post('/add-bookstore-payment', [BookstoreController::class, 'store'])->name('bookstore-store-payment');
            Route::get('/show-bookstore-invoice/{id}', [BookstoreController::class, 'showBookstoreInvoice'])->name('show-bookstore-invoice');
        });
        
    });
});