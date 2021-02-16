<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Waiter\BuyProduct as WaiterBuyProductController;
use App\Http\Controllers\Waiter\CartController as WaiterCartController;
use App\Http\Controllers\Waiter\CheckoutController as WaiterCheckoutController;
use App\Http\Controllers\Waiter\DashboardController;
use App\Http\Controllers\Waiter\OrderController as WaiterOrderController;
use App\Http\Controllers\Waiter\ProductController as WaiterProductController;
use App\Http\Controllers\Casier\DashboardController as CasierDashboardController;
use App\Http\Controllers\Casier\TransactionController as CasierTransactionsController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\TableController as AdminTableController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Owner\DashboardController as OwnerDashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/product/category/{slug}', [ProductController::class, 'category'])->name('category');

// Dashboard Owner
route::prefix('owner')
    ->middleware(['auth', 'owner'])
    ->group(function() {
        Route::get('/', [OwnerDashboardController::class, 'index'])->name('onwer-dashboard');
        Route::get('/cetak_orders', [OwnerDashboardController::class, 'cetak_orders'])->name('print-orders');
        Route::get('/cetak_transactions', [OwnerDashboardController::class, 'cetak_transactions'])->name('print-transactions');
        Route::get('/cetak_users', [OwnerDashboardController::class, 'cetak_users'])->name('print-users');
    });


// Dashboard Administrator
route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function() {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('admin-dashboard');
        Route::resource('product', AdminProductController::class);
        Route::resource('tables', AdminTableController::class);
        Route::resource('users', AdminUserController::class);
        Route::resource('categories', AdminCategoryController::class);
    });

// Dashboard Waiter
route::prefix('waiter')
    ->middleware(['auth', 'waiter'])
    ->group(function() {
        Route::get('/', [DashboardController::class, 'index'])->name('waiter-dashboard');
        Route::resource('products', WaiterProductController::class);
        Route::resource('buy-product', WaiterBuyProductController::class);
        Route::resource('carts', WaiterCartController::class);
        Route::post('/checkout', [WaiterCheckoutController::class, 'process'])->name('checkout');
        Route::resource('orders', WaiterOrderController::class);
        Route::get('/cetak_orders', [WaiterOrderController::class, 'cetak'])->name('print_orders');
    });

// Dashboard Casier
route::prefix('casier')
    ->middleware(['auth', 'casier'])
    ->group(function() {
        Route::get('/', [CasierDashboardController::class, 'index'])->name('casier-dashboard');
        Route::resource('transactions', CasierTransactionsController::class);
        Route::get('cetak_transactions', [CasierTransactionsController::class, 'cetak'])->name('print_transactions');
    });

Auth::routes();
