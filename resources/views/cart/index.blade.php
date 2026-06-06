@extends('layouts.app')

@section('title', 'Shopping Cart')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-16 sm:px-6 lg:px-8 min-h-[60vh]">
    <h1 class="text-3xl font-bold text-gray-900 mb-8">Your Cart</h1>
    
    @if(count($cart) > 0)
        <div class="bg-white shadow-sm border border-gray-200 rounded-2xl overflow-hidden mb-8">
            <ul class="divide-y divide-gray-100">
                @foreach($cart as $id => $item)
                    <li class="p-6 flex items-center gap-6 hover:bg-gray-50 transition-colors">
                        @if($item['image'])
                            <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" class="w-24 h-24 object-cover rounded-xl shadow-sm border border-gray-100">
                        @else
                            <div class="w-24 h-24 bg-gray-100 rounded-xl flex items-center justify-center text-gray-400 border border-gray-200">
                                <svg class="w-8 h-8 opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            </div>
                        @endif
                        
                        <div class="flex-1">
                            <h3 class="text-lg font-bold text-gray-900 mb-1">{{ $item['name'] }}</h3>
                            @if($item['is_one_of_a_kind'])
                                <span class="inline-block bg-amber-100 text-amber-800 text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded mb-2">1 of 1 Exclusive</span>
                            @endif
                            <p class="text-gray-500 font-medium">Qty: {{ $item['quantity'] }}</p>
                        </div>
                        
                        <div class="text-right">
                            <div class="text-xl font-bold text-brand mb-1">
                                ${{ number_format($item['price'] * $item['quantity'], 2) }}
                            </div>
                            <span class="text-xs text-gray-400">${{ number_format($item['price'], 2) }} each</span>
                        </div>
                    </li>
                @endforeach
            </ul>
            
            <div class="bg-gray-50 p-6 border-t border-gray-200 flex justify-between items-center">
                <span class="text-lg font-medium text-gray-600">Subtotal</span>
                <span class="text-3xl font-bold text-gray-900">${{ number_format($total, 2) }}</span>
            </div>
        </div>
        
        <div class="flex flex-col sm:flex-row justify-end gap-4">
            <a href="{{ route('home') }}" class="px-8 py-3.5 rounded-xl font-semibold text-gray-600 border border-gray-300 hover:bg-gray-50 transition-colors text-center">
                Continue Shopping
            </a>
            <button class="bg-brand text-white px-8 py-3.5 rounded-xl font-semibold shadow-lg shadow-brand/30 hover:bg-brand-dark transition-all transform hover:-translate-y-0.5">
                Proceed to Checkout
            </button>
        </div>
    @else
        <div class="text-center py-20 bg-white shadow-sm border border-gray-100 rounded-3xl">
            <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-900 mb-2">Your cart is empty</h2>
            <p class="text-gray-500 mb-8 max-w-sm mx-auto">Looks like you haven't added any beautiful ceramic pieces to your cart yet.</p>
            <a href="{{ route('home') }}" class="inline-block bg-brand text-white px-8 py-3 rounded-full font-semibold shadow-md hover:bg-brand-dark transition-colors">
                Explore Collection
            </a>
        </div>
    @endif
</div>
@endsection
