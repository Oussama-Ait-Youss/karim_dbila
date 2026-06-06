<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Everclay | @yield('title', 'Artisanal Pottery')</title>
    
    <!-- Modern Premium Fonts matching the design -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    @php
        // Fetch Studio Settings dynamically, caching or pulling from DB
        $settings = \App\Models\StudioSetting::first();
        // Fallback to the rich teal from the mockup if settings are empty
        $primaryColor = $settings->primary_color ?? '#115E59'; 
    @endphp
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Jost', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            DEFAULT: '{{ $primaryColor }}',
                            dark: '#0f4c48',
                            light: '#147a73',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="antialiased text-gray-800 bg-[#fbfaf8] flex flex-col min-h-screen">
    
    <!-- Top Navbar -->
    <header class="bg-[#fbfaf8] py-5 border-b border-gray-100 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            
            <!-- Logo Section -->
            <a href="{{ route('home') }}" class="flex items-center gap-2 text-brand hover:opacity-90 transition-opacity">
                <!-- SVG Logo Mimicking Everclay -->
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                </svg>
                <span class="text-2xl font-semibold tracking-tight text-gray-900">Everclay</span>
            </a>
            
            <!-- Main Navigation Links -->
            <nav class="hidden md:flex gap-10">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-brand border-b-2 border-brand pb-1' : 'text-gray-500 hover:text-brand transition-colors' }} text-sm font-semibold">HOME</a>
                <a href="{{ route('products.index') }}" class="{{ request()->routeIs('products.*') ? 'text-brand border-b-2 border-brand pb-1' : 'text-gray-500 hover:text-brand transition-colors' }} text-sm font-semibold">PRODUCTS</a>
                <a href="{{ route('custom-request.create') }}" class="{{ request()->routeIs('custom-request.*') ? 'text-brand border-b-2 border-brand pb-1' : 'text-gray-500 hover:text-brand transition-colors' }} text-sm font-semibold">BESPOKE</a>
                <a href="{{ route('blog') }}" class="{{ request()->routeIs('blog') ? 'text-brand border-b-2 border-brand pb-1' : 'text-gray-500 hover:text-brand transition-colors' }} text-sm font-semibold">BLOG</a>
                <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'text-brand border-b-2 border-brand pb-1' : 'text-gray-500 hover:text-brand transition-colors' }} text-sm font-semibold">CONTACT</a>
            </nav>

            <!-- Action Icons -->
            <div class="flex items-center gap-6 text-gray-700">
                <!-- Search Icon -->
                <button class="hover:text-brand transition-colors">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                </button>
                <!-- Profile Icon -->
                <button class="hover:text-brand transition-colors">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                </button>
                <!-- Dynamic Cart Icon -->
                <a href="{{ route('cart.index') }}" class="relative hover:text-brand transition-colors flex items-center">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                    
                    @php $cartCount = count(session('cart', [])); @endphp
                    @if($cartCount > 0)
                        <span class="absolute -top-2 -right-2 bg-brand text-white text-[10px] font-bold h-4 w-4 rounded-full flex items-center justify-center shadow-sm">
                            {{ $cartCount }}
                        </span>
                    @endif
                </a>
            </div>
        </div>
    </header>

    <!-- Global Flash Alerts -->
    @if(session('success'))
        <div class="bg-brand text-white text-center py-2.5 text-sm font-medium shadow-sm transition-all duration-300">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="bg-red-500 text-white text-center py-2.5 text-sm font-medium shadow-sm transition-all duration-300">
            {{ session('error') }}
        </div>
    @endif

    <!-- Dynamic Content Injection -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Simple Footer matching aesthetics -->
    <footer class="bg-brand text-white py-12 mt-16 text-center shadow-inner">
        <p class="text-sm opacity-90">&copy; {{ date('Y') }} Everclay. All Rights Reserved.</p>
    </footer>

</body>
</html>
