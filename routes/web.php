<?php

use App\Http\Controllers\Admin\AdminCustomRequestController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomRequestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StripeWebhookController;
use Illuminate\Support\Facades\Route;

// Storefront Navigation & Static Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::view('/blog', 'blog')->name('blog');
Route::view('/contact', 'contact')->name('contact');

// Custom Bespoke Request Form
Route::get('/custom-request', [CustomRequestController::class, 'create'])->name('custom-request.create');

// Shopping Cart Routing
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

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
