<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomRequest;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    /**
     * Display the main administration dashboard overview.
     */
    public function index(): View
    {
        $totalProducts = \App\Models\Product::count();
        $pendingRequests = CustomRequest::where('status', 'pending_review')->count();
        $recentOrders = CustomRequest::with('user')->latest()->take(5)->get();
        
        $totalOrders = class_exists(\App\Models\Order::class) ? \App\Models\Order::count() : CustomRequest::count();

        return view('admin.dashboard', compact('totalProducts', 'pendingRequests', 'recentOrders', 'totalOrders'));
    }
}
