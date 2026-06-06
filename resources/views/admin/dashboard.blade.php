@extends('layouts.admin')

@section('title', 'Dashboard Overview')

@section('admin_content')
    <div class="max-w-7xl mx-auto">
        <h1 class="text-3xl font-bold text-slate-900 tracking-tight mb-8">Dashboard Overview</h1>
                
                <!-- Metric Cards -->
                <div class="grid grid-cols-1 gap-5 sm:grid-cols-3 mb-8">
                    <!-- Total Products -->
                    <div class="bg-white overflow-hidden shadow-sm rounded-xl border border-slate-200 hover:shadow-md transition-shadow">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-indigo-50 rounded-lg p-3 border border-indigo-100">
                                    <svg class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dt class="text-sm font-bold text-slate-500 uppercase tracking-wider truncate">Total Catalog</dt>
                                    <dd class="text-3xl font-black text-slate-900 mt-1">{{ $totalProducts }}</dd>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pending Requests -->
                    <div class="bg-white overflow-hidden shadow-sm rounded-xl border border-slate-200 hover:shadow-md transition-shadow">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-amber-50 rounded-lg p-3 border border-amber-100">
                                    <svg class="h-6 w-6 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dt class="text-sm font-bold text-slate-500 uppercase tracking-wider truncate">Pending Quotes</dt>
                                    <dd class="text-3xl font-black text-slate-900 mt-1">{{ $pendingRequests }}</dd>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Total Orders -->
                    <div class="bg-white overflow-hidden shadow-sm rounded-xl border border-slate-200 hover:shadow-md transition-shadow">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-emerald-50 rounded-lg p-3 border border-emerald-100">
                                    <svg class="h-6 w-6 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dt class="text-sm font-bold text-slate-500 uppercase tracking-wider truncate">Total Orders</dt>
                                    <dd class="text-3xl font-black text-slate-900 mt-1">{{ $totalOrders }}</dd>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity List -->
                <div class="bg-white shadow-sm rounded-xl border border-slate-200 overflow-hidden">
                    <div class="px-6 py-5 border-b border-slate-200 bg-slate-50">
                        <h3 class="text-lg font-semibold text-slate-900">Recent Bespoke Requests</h3>
                    </div>
                    <ul class="divide-y divide-slate-100">
                        @forelse($recentOrders as $request)
                            <li class="px-6 py-5 flex justify-between items-center hover:bg-slate-50/50 transition-colors">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center border border-slate-200">
                                        <svg class="w-5 h-5 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-slate-900">Request #{{ $request->id }} &middot; <span class="font-medium text-indigo-600">{{ $request->customer_name }}</span></p>
                                        <p class="mt-0.5 text-xs text-slate-500 flex items-center gap-1">
                                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                            {{ $request->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                </div>
                                <div>
                                    @if($request->status === 'pending_review')
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-amber-100 text-amber-800 border border-amber-200 uppercase tracking-wider">Pending</span>
                                    @elseif($request->status === 'paid')
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-emerald-100 text-emerald-800 border border-emerald-200 uppercase tracking-wider">Paid</span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-slate-100 text-slate-800 border border-slate-200 uppercase tracking-wider">{{ str_replace('_', ' ', $request->status) }}</span>
                                    @endif
                                </div>
                            </li>
                        @empty
                            <li class="px-6 py-12 text-center text-slate-500 text-sm flex flex-col items-center">
                                <svg class="w-12 h-12 text-slate-300 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                                No recent requests found yet.
                            </li>
                        @endforelse
                    </ul>
                </div>
    </div>
@endsection
