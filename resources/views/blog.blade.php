@extends('layouts.app')

@section('title', 'Journal & Blog')

@section('content')
<div class="bg-white min-h-[70vh]">
    <!-- Minimal Blog Header -->
    <div class="bg-gray-50 py-24 border-b border-gray-100">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 tracking-tight mb-4">The Studio Journal</h1>
            <p class="text-lg text-gray-500">Thoughts, process notes, and stories behind our artisanal ceramics.</p>
        </div>
    </div>

    <!-- Articles Grid -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
            
            <!-- Article 1 -->
            <article class="group cursor-pointer flex flex-col h-full">
                <div class="w-full aspect-[4/3] bg-gray-100 rounded-3xl overflow-hidden mb-6 shadow-sm group-hover:shadow-lg transition-all duration-500">
                    <img src="https://images.unsplash.com/photo-1610701596007-11502861dcfa?q=80&w=800&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                </div>
                <div class="flex items-center gap-3 text-[10px] font-bold text-brand uppercase tracking-widest mb-3">
                    <span class="bg-brand/10 px-3 py-1 rounded-full">Process</span>
                    <span class="w-1 h-1 rounded-full bg-gray-300"></span>
                    <span class="text-gray-400">Oct 12, 2026</span>
                </div>
                <h2 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-brand transition-colors leading-tight tracking-tight">The Art of Hand Throwing on the Potter's Wheel</h2>
                <p class="text-gray-600 line-clamp-3 mb-6">Discover the meditative process of shaping raw clay into beautiful, functional silhouettes using traditional wheel throwing techniques passed down through generations in our studio.</p>
                <div class="mt-auto">
                    <span class="text-brand font-semibold text-sm flex items-center gap-2 group-hover:gap-3 transition-all">Read Journal <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg></span>
                </div>
            </article>

            <!-- Article 2 -->
            <article class="group cursor-pointer flex flex-col h-full">
                <div class="w-full aspect-[4/3] bg-gray-100 rounded-3xl overflow-hidden mb-6 shadow-sm group-hover:shadow-lg transition-all duration-500">
                    <img src="https://images.unsplash.com/photo-1578749556568-bc2c40e68b61?q=80&w=800&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                </div>
                <div class="flex items-center gap-3 text-[10px] font-bold text-brand uppercase tracking-widest mb-3">
                    <span class="bg-brand/10 px-3 py-1 rounded-full">Inspiration</span>
                    <span class="w-1 h-1 rounded-full bg-gray-300"></span>
                    <span class="text-gray-400">Sep 28, 2026</span>
                </div>
                <h2 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-brand transition-colors leading-tight tracking-tight">Finding Earthy Palettes in Raw Nature</h2>
                <p class="text-gray-600 line-clamp-3 mb-6">Our latest collection draws heavily from the raw, muted tones of the coastal cliffs and autumn forests surrounding our studio workspace, blending terracotta with slate.</p>
                <div class="mt-auto">
                    <span class="text-brand font-semibold text-sm flex items-center gap-2 group-hover:gap-3 transition-all">Read Journal <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg></span>
                </div>
            </article>

            <!-- Article 3 -->
            <article class="group cursor-pointer flex flex-col h-full">
                <div class="w-full aspect-[4/3] bg-gray-100 rounded-3xl overflow-hidden mb-6 shadow-sm group-hover:shadow-lg transition-all duration-500">
                    <img src="https://images.unsplash.com/photo-1623626359573-0db104068537?q=80&w=800&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                </div>
                <div class="flex items-center gap-3 text-[10px] font-bold text-brand uppercase tracking-widest mb-3">
                    <span class="bg-brand/10 px-3 py-1 rounded-full">Studio Life</span>
                    <span class="w-1 h-1 rounded-full bg-gray-300"></span>
                    <span class="text-gray-400">Sep 15, 2026</span>
                </div>
                <h2 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-brand transition-colors leading-tight tracking-tight">Firing the Kiln: A Delicate Balance of Heat</h2>
                <p class="text-gray-600 line-clamp-3 mb-6">Exploring the chemistry and intense heat required to transform fragile, dry clay into durable, impermeable stone through the magic of our studio kiln.</p>
                <div class="mt-auto">
                    <span class="text-brand font-semibold text-sm flex items-center gap-2 group-hover:gap-3 transition-all">Read Journal <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg></span>
                </div>
            </article>
            
        </div>
        
        <div class="mt-20 text-center">
            <button class="border-2 border-gray-200 text-gray-600 px-10 py-3 rounded-full font-bold tracking-wide hover:border-brand hover:text-brand transition-colors">
                LOAD MORE ENTRIES
            </button>
        </div>
    </div>
</div>
@endsection
