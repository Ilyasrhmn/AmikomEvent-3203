<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\MidtransWebhookController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\PartnerController;

// Rute User
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
Route::get('/checkout/{event}', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout/{event}', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/payment/{order_id}', [CheckoutController::class, 'payment'])->name('checkout.payment');
Route::get('/success/{order_id}', [CheckoutController::class, 'success'])->name('checkout.success');
Route::get('/my-ticket', [EventController::class, 'ticket'])->name('ticket');
Route::post('/midtrans/callback', [MidtransWebhookController::class, 'handle']);

// Grouping untuk URL /admin
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.post');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    // Mengamankan Route Admin (Middleware)
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('events', AdminEventController::class);
        Route::resource('categories', CategoryController::class);
        Route::get('transactions', [TransactionController::class, 'index'])->name('transactions.index');
        Route::resource('partners', PartnerController::class);
    });
});
