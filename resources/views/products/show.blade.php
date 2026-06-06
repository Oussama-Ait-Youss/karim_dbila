@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="bg-white min-h-[70vh]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-20">
        
        <!-- Breadcrumb Navigation -->
        <nav class="flex text-sm text-gray-500 mb-8 gap-2 font-medium">
            <a href="{{ route('home') }}" class="hover:text-brand transition-colors">Home</a> / 
            <a href="{{ route('products.index') }}" class="hover:text-brand transition-colors">Products</a> / 
            <span class="text-gray-900">{{ $product->name }}</span>
        </nav>

        <div class="flex flex-col lg:flex-row gap-16">
            <!-- Left: Image Gallery -->
            <div class="lg:w-1/2">
                @php
                    $primaryImage = $product->images->where('is_primary', true)->first() ?? $product->images->first();
                    $imageUrl = $primaryImage ? asset('storage/' . $primaryImage->image_path) : 'https://images.unsplash.com/photo-1578749556568-bc2c40e68b61?q=80&w=1000&auto=format&fit=crop';
                @endphp
                <div class="aspect-square bg-[#f2f4f3] rounded-3xl overflow-hidden mb-6 shadow-md border border-gray-100 group">
                    <img src="{{ $imageUrl }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                </div>
                
                @if($product->images->count() > 1)
                    <div class="grid grid-cols-4 gap-4">
                        @foreach($product->images as $img)
                            <div class="aspect-square rounded-2xl overflow-hidden border-2 {{ $img->is_primary ? 'border-brand' : 'border-transparent hover:border-gray-200' }} cursor-pointer transition-colors bg-[#f2f4f3]">
                                <img src="{{ asset('storage/' . $img->image_path) }}" class="w-full h-full object-cover">
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Right: Product Details -->
            <div class="lg:w-1/2 flex flex-col justify-center">
                <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4 tracking-tight">{{ $product->name }}</h1>
                
                <div class="flex items-center gap-4 mb-6">
                    <span class="text-3xl font-bold text-brand">${{ number_format($product->price, 2) }}</span>
                    @if($product->is_one_of_a_kind)
                        <span class="bg-amber-100 text-amber-800 text-xs font-bold uppercase tracking-wider px-3 py-1 rounded-md border border-amber-200">1 of 1 Exclusive Piece</span>
                    @endif
                </div>
                
                <p class="text-gray-600 text-lg leading-relaxed mb-8">{{ $product->description }}</p>
                
                <!-- Ceramic Specifications Grid -->
                <div class="grid grid-cols-2 gap-y-6 gap-x-4 mb-10 pb-10 border-b border-gray-100">
                    @if($product->dimensions)
                        <div>
                            <span class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1.5 flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4" /></svg>
                                Dimensions
                            </span>
                            <span class="text-gray-900 font-semibold">{{ $product->dimensions }}</span>
                        </div>
                    @endif
                    @if($product->weight)
                        <div>
                            <span class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1.5 flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" /></svg>
                                Weight
                            </span>
                            <span class="text-gray-900 font-semibold">{{ $product->weight }} kg</span>
                        </div>
                    @endif
                    @if($product->clay_type)
                        <div>
                            <span class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1.5 flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" /></svg>
                                Clay Type
                            </span>
                            <span class="text-gray-900 font-semibold">{{ ucfirst($product->clay_type) }}</span>
                        </div>
                    @endif
                    @if($product->glaze_type)
                        <div>
                            <span class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1.5 flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" /></svg>
                                Glaze Finish
                            </span>
                            <span class="text-gray-900 font-semibold">{{ ucfirst($product->glaze_type) }}</span>
                        </div>
                    @endif
                </div>
                
                <!-- Add to Cart Action -->
                <form action="{{ route('cart.add', $product->id) }}" method="POST" class="flex flex-col sm:flex-row gap-4 items-end">
                    @csrf
                    <div class="w-full sm:w-28">
                        <label for="quantity" class="block text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2">Quantity</label>
                        <input type="number" id="quantity" name="quantity" value="1" min="1" max="{{ $product->is_one_of_a_kind ? 1 : 10 }}" class="w-full bg-gray-50 border border-gray-200 text-center rounded-xl focus:ring-2 focus:ring-brand focus:border-brand py-4 text-lg font-bold" {{ $product->is_one_of_a_kind ? 'readonly' : '' }}>
                    </div>
                    <button type="submit" class="w-full sm:flex-1 bg-brand text-white px-8 py-4 rounded-xl font-bold tracking-wide shadow-lg shadow-brand/20 hover:bg-brand-dark transition-all transform hover:-translate-y-0.5 flex justify-center items-center gap-3">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" /></svg>
                        ADD TO CART
                    </button>
                </form>
                
                <!-- Trust & Security Badges -->
                <div class="flex flex-wrap items-center gap-6 mt-10 text-gray-500 text-sm font-medium bg-gray-50 p-4 rounded-2xl border border-gray-100">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                        Secure Checkout
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" /></svg>
                        Secure Packaging
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
