<?php

use App\Http\Controllers\Admin\AdminCustomRequestController;
use App\Http\Controllers\CustomRequestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::post('/custom-requests', [CustomRequestController::class, 'store'])->name('custom-requests.store');
});

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/custom-requests', [AdminCustomRequestController::class, 'index'])->name('custom-requests.index');
    Route::patch('/custom-requests/{customRequest}/quote', [AdminCustomRequestController::class, 'assignQuote'])->name('custom-requests.quote');
});
