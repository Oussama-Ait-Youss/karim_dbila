<?php

use App\Http\Controllers\Admin\AdminCustomRequestController;
use App\Http\Controllers\CustomRequestController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StripeWebhookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::post('/custom-requests', [CustomRequestController::class, 'store'])->name('custom-requests.store');
    
    // Stripe Checkout Routes
    Route::post('/custom-requests/{customRequest}/checkout', [PaymentController::class, 'checkoutCustomRequest'])->name('custom-requests.checkout');
    Route::get('/custom-requests/{customRequest}/success', function () { return 'Payment Successful!'; })->name('custom-requests.success');
    Route::get('/custom-requests/{customRequest}/cancel', function () { return 'Payment Cancelled.'; })->name('custom-requests.cancel');
});

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/custom-requests', [AdminCustomRequestController::class, 'index'])->name('custom-requests.index');
    Route::patch('/custom-requests/{customRequest}/quote', [AdminCustomRequestController::class, 'assignQuote'])->name('custom-requests.quote');
});

// Stripe Webhook Endpoint (Must be excluded from CSRF)
Route::post('/webhook/stripe', [StripeWebhookController::class, 'handleWebhook'])->name('webhook.stripe');
