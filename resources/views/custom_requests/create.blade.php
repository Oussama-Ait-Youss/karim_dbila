<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Custom Pottery | Artisanal Studio</title>
    
    <!-- Google Fonts for typography -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600&family=Playfair+Display:ital,wght@0,400;0,500;0,600;1,400&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS CDN with Forms Plugin -->
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Outfit', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
                    },
                    colors: {
                        terracotta: {
                            DEFAULT: '#c96442',
                            dark: '#a34d30',
                            light: '#e88f71'
                        },
                        stone: {
                            50: '#fafaf9',
                            100: '#f5f5f4',
                            200: '#e7e5e4',
                            700: '#44403c',
                            800: '#292524',
                            900: '#1c1917',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-[#f2ece4] text-stone-800 antialiased font-sans bg-[url('https://www.transparenttextures.com/patterns/cream-paper.png')]">
    
    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8 flex items-center justify-center">
        
        <div class="max-w-2xl w-full bg-white/95 backdrop-blur-sm shadow-2xl rounded-2xl overflow-hidden border border-stone-200 relative">
            
            <!-- Decorative Accent Top Bar -->
            <div class="h-2 w-full bg-gradient-to-r from-terracotta-light via-terracotta to-terracotta-dark"></div>

            <!-- Header Section -->
            <div class="bg-stone-50/50 px-8 py-10 border-b border-stone-100 text-center sm:text-left flex flex-col sm:flex-row justify-between items-center sm:items-start gap-4">
                <div>
                    <h2 class="text-3xl font-serif font-medium text-stone-900 mb-2 tracking-tight">Bespoke Pottery Request</h2>
                    <p class="text-stone-500 font-light">Commission a one-of-a-kind piece crafted uniquely to your vision.</p>
                </div>
                <div class="h-16 w-16 rounded-full bg-terracotta/10 flex items-center justify-center border border-terracotta/20 flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-terracotta" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                    </svg>
                </div>
            </div>

            <!-- Flash Success Message -->
            @if (session('success'))
                <div class="px-8 pt-6">
                    <div class="bg-green-50/80 border border-green-200 p-4 rounded-xl shadow-sm">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-green-800 font-medium">{{ session('success') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <form action="{{ route('custom-requests.store') }}" method="POST" enctype="multipart/form-data" class="px-8 py-8 space-y-8">
                @csrf

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-stone-700 mb-2">Design Vision & Special Instructions <span class="text-terracotta">*</span></label>
                    <textarea id="description" name="description" rows="4" 
                        class="w-full rounded-xl border-stone-200 focus:border-terracotta focus:ring focus:ring-terracotta/20 transition-all shadow-sm @error('description') border-red-500 focus:ring-red-500/20 @enderror bg-stone-50/50"
                        placeholder="Describe your desired glaze color, shape, or unique details...">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-2 text-sm text-red-500 flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" /></svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Dimensions -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="requested_height" class="block text-sm font-medium text-stone-700 mb-2">Requested Height</label>
                        <div class="relative rounded-xl shadow-sm">
                            <input type="number" step="0.01" name="requested_height" id="requested_height" value="{{ old('requested_height') }}"
                                class="w-full rounded-xl border-stone-200 pr-12 focus:border-terracotta focus:ring focus:ring-terracotta/20 transition-all @error('requested_height') border-red-500 focus:ring-red-500/20 @enderror bg-stone-50/50" placeholder="0.00">
                            <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                <span class="text-stone-400 sm:text-sm font-medium">cm</span>
                            </div>
                        </div>
                        @error('requested_height')
                            <p class="mt-2 text-sm text-red-500 flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" /></svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div>
                        <label for="requested_diameter" class="block text-sm font-medium text-stone-700 mb-2">Requested Diameter</label>
                        <div class="relative rounded-xl shadow-sm">
                            <input type="number" step="0.01" name="requested_diameter" id="requested_diameter" value="{{ old('requested_diameter') }}"
                                class="w-full rounded-xl border-stone-200 pr-12 focus:border-terracotta focus:ring focus:ring-terracotta/20 transition-all @error('requested_diameter') border-red-500 focus:ring-red-500/20 @enderror bg-stone-50/50" placeholder="0.00">
                            <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                <span class="text-stone-400 sm:text-sm font-medium">cm</span>
                            </div>
                        </div>
                        @error('requested_diameter')
                            <p class="mt-2 text-sm text-red-500 flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" /></svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <!-- Materials -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-stone-50/30 p-5 rounded-2xl border border-stone-100">
                    <div>
                        <label for="clay_type" class="block text-sm font-medium text-stone-700 mb-2">Preferred Clay</label>
                        <select id="clay_type" name="clay_type" class="w-full rounded-xl border-stone-200 focus:border-terracotta focus:ring focus:ring-terracotta/20 transition-all shadow-sm @error('clay_type') border-red-500 focus:ring-red-500/20 @enderror bg-white">
                            <option value="">Studio Recommendation</option>
                            <option value="terracotta" {{ old('clay_type') == 'terracotta' ? 'selected' : '' }}>Warm Terracotta</option>
                            <option value="porcelain" {{ old('clay_type') == 'porcelain' ? 'selected' : '' }}>Fine Porcelain</option>
                            <option value="stoneware" {{ old('clay_type') == 'stoneware' ? 'selected' : '' }}>Speckled Stoneware</option>
                            <option value="earthenware" {{ old('clay_type') == 'earthenware' ? 'selected' : '' }}>Rustic Earthenware</option>
                        </select>
                        @error('clay_type')
                            <p class="mt-2 text-sm text-red-500 flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" /></svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div>
                        <label for="glaze_type" class="block text-sm font-medium text-stone-700 mb-2">Glaze Finish</label>
                        <select id="glaze_type" name="glaze_type" class="w-full rounded-xl border-stone-200 focus:border-terracotta focus:ring focus:ring-terracotta/20 transition-all shadow-sm @error('glaze_type') border-red-500 focus:ring-red-500/20 @enderror bg-white">
                            <option value="">Studio Recommendation</option>
                            <option value="matte" {{ old('glaze_type') == 'matte' ? 'selected' : '' }}>Smooth Matte</option>
                            <option value="glossy" {{ old('glaze_type') == 'glossy' ? 'selected' : '' }}>High Gloss</option>
                            <option value="satin" {{ old('glaze_type') == 'satin' ? 'selected' : '' }}>Soft Satin</option>
                            <option value="raw" {{ old('glaze_type') == 'raw' ? 'selected' : '' }}>Unglazed / Raw Texture</option>
                        </select>
                        @error('glaze_type')
                            <p class="mt-2 text-sm text-red-500 flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" /></svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <!-- Sketch Upload -->
                <div>
                    <label class="block text-sm font-medium text-stone-700 mb-2">Reference Sketch or Inspiration Photo <span class="text-terracotta">*</span></label>
                    <div id="dropzone" class="mt-1 flex justify-center px-6 pt-8 pb-8 border-2 border-stone-200 border-dashed rounded-2xl hover:border-terracotta hover:bg-terracotta/5 transition-all group relative cursor-pointer @error('sketch_image') border-red-500 bg-red-50 @enderror" onclick="document.getElementById('sketch_image').click()">
                        <div class="space-y-3 text-center pointer-events-none flex flex-col items-center">
                            <div class="h-14 w-14 rounded-full bg-stone-100 flex items-center justify-center group-hover:bg-white transition-colors group-hover:shadow-sm">
                                <svg class="h-7 w-7 text-stone-400 group-hover:text-terracotta transition-colors" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div class="flex flex-col text-sm text-stone-600 justify-center">
                                <span class="relative cursor-pointer rounded-md font-medium text-terracotta focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-terracotta mb-1">
                                    <span>Upload a file</span>
                                </span>
                                <p class="font-light text-stone-500">or drag and drop here</p>
                            </div>
                            <p class="text-xs text-stone-400 bg-stone-100 px-3 py-1 rounded-full group-hover:bg-white transition-colors">PNG, JPG up to 5MB</p>
                        </div>
                        <input id="sketch_image" name="sketch_image" type="file" class="sr-only" accept="image/jpeg, image/png, image/jpg">
                    </div>
                    @error('sketch_image')
                        <p class="mt-2 text-sm text-red-500 flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" /></svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="pt-6">
                    <button type="submit" class="w-full flex justify-center py-4 px-4 border border-transparent rounded-xl shadow-lg shadow-terracotta/30 text-base font-medium text-white bg-terracotta hover:bg-terracotta-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-terracotta transition-all transform hover:-translate-y-0.5 active:translate-y-0">
                        Submit Bespoke Request
                    </button>
                    <p class="text-center text-xs text-stone-400 mt-5 flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                        Your request is secure. We will review your design and provide a personalized quote.
                    </p>
                </div>
            </form>
        </div>
    </div>

    <!-- Small script to handle file input display -->
    <script>
        const fileInput = document.getElementById('sketch_image');
        const dropzone = document.getElementById('dropzone');

        fileInput.addEventListener('change', function(e) {
            const fileName = e.target.files[0]?.name;
            if(fileName) {
                const textContainer = dropzone.querySelector('p.text-xs');
                textContainer.innerHTML = `<span class="font-semibold text-terracotta truncate max-w-xs inline-block align-bottom">${fileName}</span> ready for upload`;
                dropzone.classList.add('border-terracotta', 'bg-terracotta/5');
            }
        });

        // Basic drag and drop styling
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropzone.addEventListener(eventName, preventDefaults, false)
        });

        function preventDefaults (e) {
            e.preventDefault()
            e.stopPropagation()
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            dropzone.addEventListener(eventName, highlight, false)
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropzone.addEventListener(eventName, unhighlight, false)
        });

        function highlight(e) {
            dropzone.classList.add('border-terracotta', 'bg-terracotta/10')
        }

        function unhighlight(e) {
            dropzone.classList.remove('border-terracotta', 'bg-terracotta/10')
        }

        dropzone.addEventListener('drop', handleDrop, false)

        function handleDrop(e) {
            let dt = e.dataTransfer
            let files = dt.files
            fileInput.files = files
            
            // trigger change event
            const event = new Event('change');
            fileInput.dispatchEvent(event);
        }
    </script>
</body>
</html>
