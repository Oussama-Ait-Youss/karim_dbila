@extends('layouts.app')

@section('title', 'Shop All Products')

@section('content')
<div class="bg-white min-h-[70vh]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        
        <!-- Header & Sorting -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-12 gap-6 border-b border-gray-100 pb-8">
            <div>
                <h1 class="text-4xl font-bold text-gray-900 tracking-tight">Shop All Ceramics</h1>
                <p class="mt-2 text-gray-500">Discover our full collection of handcrafted pottery, vases, and tableware.</p>
            </div>
            
            <div class="flex items-center gap-4">
                <div class="relative">
                    <select class="appearance-none bg-gray-50 border border-gray-200 text-gray-700 py-2.5 pl-4 pr-10 rounded-xl focus:outline-none focus:ring-2 focus:ring-brand focus:border-brand shadow-sm font-medium text-sm transition-all cursor-pointer">
                        <option>Featured</option>
                        <option>Price: Low to High</option>
                        <option>Price: High to Low</option>
                        <option>Newest Arrivals</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-400">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row gap-12">
            <!-- Sidebar Filters -->
            <div class="w-full lg:w-64 flex-shrink-0">
                <div class="bg-gray-50 p-6 rounded-3xl border border-gray-100 sticky top-28">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Categories</h3>
                    <ul class="space-y-4">
                        <li><a href="#" class="text-brand font-semibold flex justify-between items-center">All Products <span class="bg-brand/10 text-brand text-xs py-0.5 px-2 rounded-full font-bold">{{ $products->total() }}</span></a></li>
                        <li><a href="#" class="text-gray-600 hover:text-brand transition-colors flex justify-between items-center font-medium">Vases</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-brand transition-colors flex justify-between items-center font-medium">Plates</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-brand transition-colors flex justify-between items-center font-medium">Mugs</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-brand transition-colors flex justify-between items-center font-medium">Sculptures</a></li>
                    </ul>
                    
                    <h3 class="text-lg font-bold text-gray-900 mt-10 mb-4">Materials</h3>
                    <ul class="space-y-4">
                        <li><label class="flex items-center gap-3 cursor-pointer group"><input type="checkbox" class="rounded border-gray-300 text-brand focus:ring-brand w-4 h-4 transition-colors"><span class="text-gray-600 font-medium group-hover:text-brand transition-colors">Terracotta</span></label></li>
                        <li><label class="flex items-center gap-3 cursor-pointer group"><input type="checkbox" class="rounded border-gray-300 text-brand focus:ring-brand w-4 h-4 transition-colors"><span class="text-gray-600 font-medium group-hover:text-brand transition-colors">Stoneware</span></label></li>
                        <li><label class="flex items-center gap-3 cursor-pointer group"><input type="checkbox" class="rounded border-gray-300 text-brand focus:ring-brand w-4 h-4 transition-colors"><span class="text-gray-600 font-medium group-hover:text-brand transition-colors">Porcelain</span></label></li>
                    </ul>
                </div>
            </div>

            <!-- Product Grid -->
            <div class="flex-1">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-12">
                    @forelse($products as $product)
                        @php
                            $primaryImage = $product->images->first();
                            $imageUrl = $primaryImage ? asset('storage/' . $primaryImage->image_path) : 'https://images.unsplash.com/photo-1578749556568-bc2c40e68b61?q=80&w=500&auto=format&fit=crop';
                        @endphp
                        <div class="group relative flex flex-col h-full">
                            <a href="{{ route('products.show', $product->id) }}" class="block relative w-full aspect-square bg-[#f2f4f3] rounded-2xl overflow-hidden mb-5 shadow-sm group-hover:shadow-xl transition-all duration-300">
                                @if($product->is_one_of_a_kind)
                                    <div class="absolute top-0 left-0 bg-red-600 text-white text-[10px] font-bold tracking-wider uppercase px-4 py-1.5 rounded-br-xl z-10 shadow-md">
                                        1 of 1 Sale
                                    </div>
                                @endif
                                <img src="{{ $imageUrl }}" alt="{{ $product->name }}" class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500 ease-out">
                            </a>
                            
                            <h3 class="text-base font-semibold text-gray-900 mb-1 line-clamp-1"><a href="{{ route('products.show', $product->id) }}" class="hover:text-brand transition-colors">{{ $product->name }}</a></h3>
                            
                            <div class="flex items-center justify-between mt-auto pt-2">
                                <div class="flex items-baseline gap-2">
                                    <span class="text-brand font-bold text-lg">${{ number_format($product->price, 2) }}</span>
                                    @if($product->price > 50)
                                        <span class="text-gray-400 text-sm line-through">${{ number_format($product->price * 1.3, 2) }}</span>
                                    @endif
                                </div>
                                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center text-gray-600 hover:bg-brand hover:text-white transition-all shadow-sm border border-gray-200 transform hover:-translate-y-0.5">
                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" /></svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full py-20 text-center bg-gray-50 rounded-3xl border border-dashed border-gray-200">
                            <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center mx-auto mb-4 shadow-sm border border-gray-100">
                                <svg class="w-10 h-10 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 12H4" /></svg>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900">No products found</h3>
                            <p class="mt-1 text-gray-500 max-w-sm mx-auto">We couldn't find any items matching your current filters. Check back soon for beautiful ceramics.</p>
                        </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                @if($products->hasPages())
                    <div class="mt-16 border-t border-gray-100 pt-8">
                        {{ $products->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
