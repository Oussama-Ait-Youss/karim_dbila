<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Custom Requests</title>
    
    <!-- Google Fonts for typography -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS CDN with Forms Plugin -->
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        slate: {
                            50: '#f8fafc',
                            100: '#f1f5f9',
                            200: '#e2e8f0',
                            300: '#cbd5e1',
                            400: '#94a3b8',
                            500: '#64748b',
                            600: '#475569',
                            700: '#334155',
                            800: '#1e293b',
                            900: '#0f172a',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-slate-50 text-slate-800 antialiased h-full">

    <div class="min-h-full">
        <!-- Minimalist Admin Navbar -->
        <nav class="bg-slate-900 shadow-md">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <div class="flex-shrink-0 flex items-center">
                            <span class="text-white font-bold text-lg tracking-tight flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                                </svg>
                                Studio Admin
                            </span>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <span class="text-slate-300 text-sm font-medium">Administrator</span>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content Area -->
        <main class="py-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="sm:flex sm:items-center sm:justify-between mb-8 border-b border-slate-200 pb-5">
                    <div>
                        <h1 class="text-3xl font-bold text-slate-900 tracking-tight">Custom Requests Overview</h1>
                        <p class="mt-2 text-sm text-slate-600">Review incoming bespoke pottery designs and assign precise quotes to clients.</p>
                    </div>
                </div>

                <!-- Success Flash Alert -->
                @if(session('success'))
                    <div class="mb-8 bg-emerald-50 border border-emerald-200 rounded-xl p-4 flex items-center shadow-sm">
                        <svg class="h-6 w-6 text-emerald-500 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-emerald-800 font-medium">{{ session('success') }}</span>
                    </div>
                @endif

                <!-- Dynamic Request Cards -->
                <div class="space-y-8">
                    @forelse ($customRequests as $request)
                        <div class="bg-white border border-slate-200 shadow-sm rounded-2xl overflow-hidden flex flex-col lg:flex-row transition-shadow hover:shadow-md">
                            
                            <!-- Uploaded Artwork Thumbnail -->
                            <div class="lg:w-80 flex-shrink-0 bg-slate-50 border-b lg:border-b-0 lg:border-r border-slate-200 flex flex-col">
                                @if($request->sketch_image_path)
                                    <a href="{{ asset('storage/' . $request->sketch_image_path) }}" target="_blank" class="block h-full group relative overflow-hidden">
                                        <img src="{{ asset('storage/' . $request->sketch_image_path) }}" alt="Client Sketch" class="w-full h-64 lg:h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out">
                                        <div class="absolute inset-0 bg-slate-900/0 group-hover:bg-slate-900/10 transition-colors flex items-center justify-center">
                                            <span class="opacity-0 group-hover:opacity-100 bg-white/90 text-slate-800 text-xs font-semibold px-3 py-1 rounded-full shadow-sm transition-opacity">View Full Size</span>
                                        </div>
                                    </a>
                                @else
                                    <div class="h-64 lg:h-full flex flex-col items-center justify-center text-slate-400 p-6">
                                        <svg class="h-12 w-12 mb-3 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        <span class="text-sm font-medium">No sketch provided</span>
                                    </div>
                                @endif
                            </div>

                            <!-- Request Details & Actions -->
                            <div class="p-6 lg:p-8 flex-1 flex flex-col">
                                
                                <!-- Header & Badges -->
                                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start mb-6 gap-4">
                                    <div>
                                        <div class="flex items-center gap-3 mb-1">
                                            <h3 class="text-xl font-bold text-slate-900">Request #{{ $request->id }}</h3>
                                            <span class="text-sm text-slate-400 font-medium">{{ $request->created_at->format('M d, Y') }}</span>
                                        </div>
                                        <p class="text-sm text-slate-600 flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="font-semibold text-slate-800">{{ $request->user->name ?? 'Unknown Client' }}</span> 
                                            &middot; 
                                            <a href="mailto:{{ $request->user->email ?? '' }}" class="text-blue-600 hover:underline">{{ $request->user->email ?? 'No email' }}</a>
                                        </p>
                                    </div>
                                    <div>
                                        @if($request->status === 'pending_review')
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-orange-100 text-orange-800 border border-orange-200 uppercase tracking-wide">
                                                <span class="w-1.5 h-1.5 rounded-full bg-orange-500 mr-2"></span>
                                                Pending Review
                                            </span>
                                        @elseif(in_array($request->status, ['quoted', 'paid', 'in_production', 'ready_for_pickup']))
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-emerald-100 text-emerald-800 border border-emerald-200 uppercase tracking-wide">
                                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 mr-2"></span>
                                                {{ str_replace('_', ' ', $request->status) }}
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-slate-100 text-slate-800 border border-slate-200 uppercase tracking-wide">
                                                {{ str_replace('_', ' ', $request->status) }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Specs Grid -->
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
                                    <div class="bg-slate-50 p-4 rounded-xl border border-slate-100 flex items-start gap-3">
                                        <div class="bg-white p-2 rounded-lg border border-slate-200 text-slate-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4" />
                                            </svg>
                                        </div>
                                        <div>
                                            <span class="block text-slate-500 font-bold text-[10px] uppercase tracking-widest mb-0.5">Dimensions</span>
                                            <p class="text-slate-800 text-sm font-medium">H: {{ $request->requested_height ? $request->requested_height . ' cm' : 'TBD' }} <span class="text-slate-300 mx-1">&times;</span> D: {{ $request->requested_diameter ? $request->requested_diameter . ' cm' : 'TBD' }}</p>
                                        </div>
                                    </div>
                                    <div class="bg-slate-50 p-4 rounded-xl border border-slate-100 flex items-start gap-3">
                                        <div class="bg-white p-2 rounded-lg border border-slate-200 text-slate-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                                            </svg>
                                        </div>
                                        <div>
                                            <span class="block text-slate-500 font-bold text-[10px] uppercase tracking-widest mb-0.5">Materials</span>
                                            <p class="text-slate-800 text-sm font-medium"><span class="text-slate-500 font-normal">Clay:</span> {{ $request->clay_type ? ucfirst($request->clay_type) : 'Studio Rec' }}</p>
                                            <p class="text-slate-800 text-sm font-medium"><span class="text-slate-500 font-normal">Glaze:</span> {{ $request->glaze_type ? ucfirst($request->glaze_type) : 'Studio Rec' }}</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Description Block -->
                                <div class="mb-6 flex-1">
                                    <span class="block text-slate-500 font-bold text-[10px] uppercase tracking-widest mb-2">Client Description & Vision</span>
                                    <div class="text-sm text-slate-700 bg-white p-4 border border-slate-200 rounded-xl leading-relaxed whitespace-pre-line shadow-inner shadow-slate-50">{{ $request->description }}</div>
                                </div>

                                <!-- Pricing Action Footer -->
                                @if($request->status === 'pending_review')
                                    <div class="mt-auto pt-5 border-t border-slate-200">
                                        <form action="{{ route('admin.custom-requests.quote', $request->id) }}" method="POST" class="flex flex-col sm:flex-row items-end gap-3">
                                            @csrf
                                            @method('PATCH')
                                            
                                            <div class="w-full sm:w-64">
                                                <label for="quoted_price_{{ $request->id }}" class="block text-sm font-semibold text-slate-700 mb-1.5">Assign Custom Quote</label>
                                                <div class="relative rounded-lg shadow-sm">
                                                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                                        <span class="text-slate-500 sm:text-sm font-medium">$</span>
                                                    </div>
                                                    <input type="number" step="0.01" name="quoted_price" id="quoted_price_{{ $request->id }}" 
                                                        class="focus:ring-slate-800 focus:border-slate-800 block w-full pl-8 pr-4 py-2.5 sm:text-sm border-slate-300 rounded-lg transition-colors @error('quoted_price') border-red-500 text-red-900 placeholder-red-300 focus:ring-red-500 focus:border-red-500 @enderror" 
                                                        placeholder="0.00" required>
                                                </div>
                                                @error('quoted_price')
                                                    <p class="mt-1.5 text-xs text-red-600 flex items-center gap-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" /></svg>
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>
                                            
                                            <button type="submit" class="w-full sm:w-auto inline-flex justify-center items-center px-6 py-2.5 border border-transparent shadow-md text-sm font-semibold rounded-lg text-white bg-slate-900 hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-900 transition-all transform hover:-translate-y-0.5">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                Submit Quote
                                            </button>
                                        </form>
                                    </div>
                                @elseif($request->quoted_price)
                                    <div class="mt-auto pt-5 border-t border-slate-200 flex items-center bg-slate-50 -mx-6 lg:-mx-8 -mb-6 lg:-mb-8 px-6 lg:px-8 py-4">
                                        <div class="flex items-center gap-2">
                                            <div class="h-10 w-10 bg-emerald-100 rounded-full flex items-center justify-center border border-emerald-200">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <span class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Assigned Quote</span>
                                                <span class="text-xl font-black text-slate-900">${{ number_format($request->quoted_price, 2) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @empty
                        <!-- Empty State -->
                        <div class="text-center py-20 bg-white rounded-2xl border-2 border-dashed border-slate-200 shadow-sm">
                            <div class="mx-auto h-16 w-16 bg-slate-50 rounded-full flex items-center justify-center mb-4">
                                <svg class="h-8 w-8 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-slate-900">No Pending Requests</h3>
                            <p class="mt-1 text-slate-500 max-w-sm mx-auto">There are currently no custom bespoke pottery requests awaiting a quote. Check back later.</p>
                        </div>
                    @endforelse
                </div>

                <!-- Pagination Engine -->
                @if($customRequests->hasPages())
                    <div class="mt-8 bg-white border border-slate-200 shadow-sm rounded-xl p-4">
                        {{ $customRequests->links() }}
                    </div>
                @endif
                
            </div>
        </main>
    </div>

</body>
</html>
