<?php

use App\Http\Controllers\Admin\AdminCustomRequestController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Auth\LoginController;
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

// Public Authentication
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Secure Administration Area (Native Auth)
Route::middleware(['auth'])->prefix('admin')->group(function () {
    // Dashboard
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    
    // Custom Requests
    Route::get('/custom-requests', [AdminCustomRequestController::class, 'index'])->name('admin.custom-requests.index');
    Route::patch('/custom-requests/{customRequest}/quote', [AdminCustomRequestController::class, 'assignQuote'])->name('admin.custom-requests.quote');
    
    // Products Management
    Route::get('/products', [AdminProductController::class, 'index'])->name('admin.products.index');
    Route::get('/products/create', [AdminProductController::class, 'create'])->name('admin.products.create');
    Route::post('/products/store', [AdminProductController::class, 'store'])->name('admin.products.store');
    Route::get('/products/{product}/edit', [AdminProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/products/{product}', [AdminProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/products/{product}', [AdminProductController::class, 'destroy'])->name('admin.products.destroy');

    // Profile & Security Settings
    Route::get('/profile', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::patch('/profile', [AdminProfileController::class, 'updateProfile'])->name('admin.profile.update');
    Route::put('/password', [AdminProfileController::class, 'updatePassword'])->name('admin.password.update');
});

// Stripe Webhook Endpoint (Must be excluded from CSRF)
Route::post('/webhook/stripe', [StripeWebhookController::class, 'handleWebhook'])->name('webhook.stripe');
