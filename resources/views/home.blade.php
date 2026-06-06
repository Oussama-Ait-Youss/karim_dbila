@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-r from-[#eef2f1] to-[#f4f7f6] py-16 lg:py-24 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 flex flex-col md:flex-row items-center">
        <div class="md:w-1/2 md:pr-12 text-center md:text-left">
            <h1 class="text-5xl lg:text-6xl font-semibold text-gray-900 leading-tight mb-6 tracking-tight">
                Timeless Elegance In <br/><span class="text-brand">Every Space</span>
            </h1>
            <p class="text-gray-600 mb-8 text-lg max-w-md mx-auto md:mx-0">
                Elevate every sip with thoughtfully crafted glassware for everyday moments and special occasions.
            </p>
            <a href="#" class="inline-block border-2 border-brand text-brand hover:bg-brand hover:text-white transition-colors px-10 py-3.5 rounded-full font-medium text-sm tracking-widest shadow-sm hover:shadow-md">
                SHOP NOW
            </a>
        </div>
        <div class="md:w-1/2 mt-12 md:mt-0 relative flex justify-center">
            <!-- Decorative circle accent -->
            <div class="absolute right-0 top-1/2 -translate-y-1/2 w-72 h-72 bg-brand rounded-full mix-blend-multiply opacity-80 blur-2xl"></div>
            <!-- Main Hero Image (Using a representative vase image) -->
            <img src="https://images.unsplash.com/photo-1610701596007-11502861dcfa?q=80&w=800&auto=format&fit=crop" alt="Ceramic Vases" class="relative z-10 w-full max-w-sm rounded-2xl shadow-2xl object-cover h-[450px]">
        </div>
    </div>
</section>

<!-- Categories Block -->
<section class="py-20 bg-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 text-center">
            <!-- Mugs -->
            <div class="flex flex-col items-center group cursor-pointer">
                <div class="w-24 h-24 rounded-full border border-gray-200 flex items-center justify-center mb-5 text-brand group-hover:bg-brand group-hover:text-white transition-colors duration-300 shadow-sm">
                    <svg class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 8h-3V4H3v13a4 4 0 004 4h4c1.47 0 2.76-.81 3.46-2.03A3 3 0 0017 21h3a3 3 0 003-3V11a3 3 0 00-3-3zM7 8h6M7 12h6"/></svg>
                </div>
                <h3 class="font-semibold text-2xl mb-2 text-gray-900">Mugs</h3>
                <p class="text-sm text-gray-500 leading-relaxed max-w-xs">Various designs, such as handmade, glazed, rustic and personalized.</p>
            </div>
            <!-- Plates -->
            <div class="flex flex-col items-center group cursor-pointer">
                <div class="w-24 h-24 rounded-full border border-gray-200 flex items-center justify-center mb-5 text-brand group-hover:bg-brand group-hover:text-white transition-colors duration-300 shadow-sm">
                    <svg class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 100-16 8 8 0 000 16z"/></svg>
                </div>
                <h3 class="font-semibold text-2xl mb-2 text-gray-900">Plates</h3>
                <p class="text-sm text-gray-500 leading-relaxed max-w-xs">Various shapes, such as dinner plates, and decorative plates.</p>
            </div>
            <!-- Vases -->
            <div class="flex flex-col items-center group cursor-pointer">
                <div class="w-24 h-24 rounded-full border border-gray-200 flex items-center justify-center mb-5 text-brand group-hover:bg-brand group-hover:text-white transition-colors duration-300 shadow-sm">
                    <svg class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 8h14M8 8v10a2 2 0 002 2h4a2 2 0 002-2V8M10 4h4a1 1 0 011 1v3H9V5a1 1 0 011-1z"/></svg>
                </div>
                <h3 class="font-semibold text-2xl mb-2 text-gray-900">Vases</h3>
                <p class="text-sm text-gray-500 leading-relaxed max-w-xs">Various ceramic products such as vases, statues, and candle holders.</p>
            </div>
        </div>
    </div>
</section>

<!-- Promotional Banner -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-20">
    <div class="bg-brand rounded-3xl p-10 md:p-14 flex flex-col md:flex-row items-center justify-between text-white relative overflow-hidden shadow-2xl">
        <div class="relative z-10 max-w-xl text-center md:text-left">
            <h2 class="text-3xl md:text-4xl font-semibold mb-4 leading-tight">Exclusive Ceramic Collection Sale</h2>
            <p class="text-white opacity-80 mb-8 font-light text-lg">Upgrade your space with handcrafted ceramic pieces, earthenware and decor designed for elegance and durability.</p>
            <a href="#" class="text-white border-b-2 border-white pb-1 font-semibold tracking-wide hover:text-gray-200 hover:border-gray-200 transition-colors inline-flex items-center gap-2">
                SHOP NOW <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>
        <!-- 50% Off Graphic -->
        <div class="relative z-10 mt-10 md:mt-0 bg-white text-brand font-black text-5xl md:text-6xl px-8 py-5 rounded-2xl transform -rotate-3 border-4 border-dashed border-brand shadow-xl">
            50% OFF
        </div>
    </div>
</section>

<!-- Dynamic Best Sellers Grid -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-24">
    <!-- Section Header & Filters -->
    <div class="flex flex-col md:flex-row justify-between items-center md:items-end mb-10 gap-4">
        <h2 class="text-4xl font-bold text-gray-900">Our Best Seller</h2>
        <div class="flex gap-3">
            <button class="px-6 py-2 rounded-full bg-brand text-white text-sm font-semibold tracking-wide shadow-md">Ceramic</button>
            <button class="px-6 py-2 rounded-full border border-gray-300 text-gray-600 text-sm font-medium hover:bg-gray-50 transition-colors">Glass</button>
            <button class="px-6 py-2 rounded-full border border-gray-300 text-gray-600 text-sm font-medium hover:bg-gray-50 transition-colors">Pottery</button>
        </div>
    </div>

    <!-- Product Loop -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-8 gap-y-12">
        @forelse($featuredProducts as $product)
            @php
                $primaryImage = $product->images->first(); // Eager loaded where is_primary = true
                $imageUrl = $primaryImage ? asset('storage/' . $primaryImage->image_path) : 'https://images.unsplash.com/photo-1578749556568-bc2c40e68b61?q=80&w=500&auto=format&fit=crop';
            @endphp
            <div class="group relative">
                <!-- Image Container -->
                <div class="relative w-full aspect-square bg-[#f2f4f3] rounded-2xl overflow-hidden mb-5 shadow-sm group-hover:shadow-xl transition-all duration-300">
                    
                    <!-- 1-of-1 Badge -->
                    @if($product->is_one_of_a_kind)
                        <div class="absolute top-0 left-0 bg-red-600 text-white text-[10px] font-bold tracking-wider uppercase px-4 py-1.5 rounded-br-xl z-10 shadow-md">
                            1 of 1 Sale
                        </div>
                    @endif
                    
                    <img src="{{ $imageUrl }}" alt="{{ $product->name }}" class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500 ease-out">
                    
                    <!-- Add to Cart Overlay Form -->
                    <form action="{{ route('cart.add', $product->id) }}" method="POST" class="absolute bottom-4 left-4 right-4 opacity-0 group-hover:opacity-100 transition-all duration-300 translate-y-4 group-hover:translate-y-0">
                        @csrf
                        <button type="submit" class="w-full bg-white/95 backdrop-blur text-gray-900 font-bold py-3 rounded-xl shadow-lg hover:bg-brand hover:text-white transition-colors text-sm flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                            Add to Cart
                        </button>
                    </form>
                </div>

                <!-- Product Info -->
                <h3 class="text-base font-semibold text-gray-900 mb-1">{{ $product->name }}</h3>
                <div class="flex items-baseline gap-2">
                    <span class="text-brand font-bold text-lg">${{ number_format($product->price, 2) }}</span>
                    <!-- Fake MSRP crossout for effect if item is expensive -->
                    @if($product->price > 50)
                        <span class="text-gray-400 text-sm line-through">${{ number_format($product->price * 1.3, 2) }}</span>
                    @endif
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-16 bg-gray-50 rounded-2xl border border-dashed border-gray-200">
                <p class="text-gray-500 text-lg">Our catalog is currently being updated. Check back soon for beautiful ceramics.</p>
            </div>
        @endforelse
    </div>

    <!-- View All CTA -->
    <div class="mt-16 text-center">
        <a href="#" class="inline-block border-2 border-brand text-brand hover:bg-brand hover:text-white transition-colors px-10 py-3 rounded-full font-semibold text-sm tracking-widest shadow-sm">
            VIEW ALL PRODUCT
        </a>
    </div>
</section>
@endsection
