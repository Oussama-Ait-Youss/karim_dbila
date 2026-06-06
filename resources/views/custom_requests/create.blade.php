@extends('layouts.app')

@section('title', 'Request Custom Pottery')

@section('content')
<div class="min-h-screen py-16 px-4 sm:px-6 lg:px-8">
    
    <!-- HEADER INTRO ALIGNMENT -->
    <div class="text-center mb-12">
        <h1 class="text-3xl md:text-5xl font-serif text-slate-900 tracking-tight mb-4">Bespoke Pottery Request</h1>
        <p class="text-slate-500 max-w-xl mx-auto font-light text-base md:text-lg">Commission a one-of-a-kind piece crafted uniquely to your vision.</p>
    </div>

    <!-- FORM WRAPPER -->
    <div class="max-w-2xl mx-auto bg-white shadow-xl rounded-2xl overflow-hidden border border-slate-100 relative">


        <form action="{{ route('custom-request.store') }}" method="POST" enctype="multipart/form-data" class="px-8 py-8 space-y-8">
            @csrf

            <!-- Contact Information -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pb-6 border-b border-slate-100">
                <div class="md:col-span-2">
                    <label for="customer_name" class="block text-sm font-medium text-slate-700 mb-2">Full Name <span class="text-brand">*</span></label>
                    <input type="text" name="customer_name" id="customer_name" value="{{ old('customer_name') }}" required
                        class="w-full rounded-xl border-slate-200 focus:border-brand focus:ring focus:ring-brand/20 transition-all shadow-sm @error('customer_name') border-red-500 @enderror bg-slate-50" placeholder="Jane Doe">
                    @error('customer_name')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="customer_email" class="block text-sm font-medium text-slate-700 mb-2">Email Address <span class="text-brand">*</span></label>
                    <input type="email" name="customer_email" id="customer_email" value="{{ old('customer_email') }}" required
                        class="w-full rounded-xl border-slate-200 focus:border-brand focus:ring focus:ring-brand/20 transition-all shadow-sm @error('customer_email') border-red-500 @enderror bg-slate-50" placeholder="jane@example.com">
                    @error('customer_email')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="customer_phone" class="block text-sm font-medium text-slate-700 mb-2">Phone Number</label>
                    <input type="tel" name="customer_phone" id="customer_phone" value="{{ old('customer_phone') }}"
                        class="w-full rounded-xl border-slate-200 focus:border-brand focus:ring focus:ring-brand/20 transition-all shadow-sm @error('customer_phone') border-red-500 @enderror bg-slate-50" placeholder="+1 (555) 000-0000">
                    @error('customer_phone')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Description -->
            <div>
                <label for="design_vision" class="block text-sm font-medium text-slate-700 mb-2">Design Vision & Special Instructions <span class="text-brand">*</span></label>
                <textarea id="design_vision" name="design_vision" rows="4" 
                    class="w-full rounded-xl border-slate-200 focus:border-brand focus:ring focus:ring-brand/20 transition-all shadow-sm @error('design_vision') border-red-500 focus:ring-red-500/20 @enderror bg-slate-50"
                    placeholder="Describe your desired glaze color, shape, or unique details...">{{ old('design_vision') }}</textarea>
                @error('design_vision')
                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Dimensions -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="height" class="block text-sm font-medium text-slate-700 mb-2">Requested Height</label>
                    <div class="relative rounded-xl shadow-sm">
                        <input type="number" step="0.01" name="height" id="height" value="{{ old('height') }}"
                            class="w-full rounded-xl border-slate-200 pr-12 focus:border-brand focus:ring focus:ring-brand/20 transition-all @error('height') border-red-500 @enderror bg-slate-50" placeholder="0.00">
                        <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                            <span class="text-slate-400 sm:text-sm font-medium">cm</span>
                        </div>
                    </div>
                    @error('height')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="diameter" class="block text-sm font-medium text-slate-700 mb-2">Requested Diameter</label>
                    <div class="relative rounded-xl shadow-sm">
                        <input type="number" step="0.01" name="diameter" id="diameter" value="{{ old('diameter') }}"
                            class="w-full rounded-xl border-slate-200 pr-12 focus:border-brand focus:ring focus:ring-brand/20 transition-all @error('diameter') border-red-500 @enderror bg-slate-50" placeholder="0.00">
                        <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                            <span class="text-slate-400 sm:text-sm font-medium">cm</span>
                        </div>
                    </div>
                    @error('diameter')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Materials -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-slate-50 p-5 rounded-2xl border border-slate-100">
                <div>
                    <label for="clay_type" class="block text-sm font-medium text-slate-700 mb-2">Preferred Clay</label>
                    <select id="clay_type" name="clay_type" class="w-full rounded-xl border-slate-200 focus:border-brand focus:ring focus:ring-brand/20 transition-all shadow-sm @error('clay_type') border-red-500 @enderror bg-white">
                        <option value="">Studio Recommendation</option>
                        <option value="Terracotta" {{ old('clay_type') == 'Terracotta' ? 'selected' : '' }}>Warm Terracotta</option>
                        <option value="Porcelain" {{ old('clay_type') == 'Porcelain' ? 'selected' : '' }}>Fine Porcelain</option>
                        <option value="Stoneware" {{ old('clay_type') == 'Stoneware' ? 'selected' : '' }}>Speckled Stoneware</option>
                        <option value="Earthenware" {{ old('clay_type') == 'Earthenware' ? 'selected' : '' }}>Rustic Earthenware</option>
                    </select>
                    @error('clay_type')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="glaze_finish" class="block text-sm font-medium text-slate-700 mb-2">Glaze Finish</label>
                    <select id="glaze_finish" name="glaze_finish" class="w-full rounded-xl border-slate-200 focus:border-brand focus:ring focus:ring-brand/20 transition-all shadow-sm @error('glaze_finish') border-red-500 @enderror bg-white">
                        <option value="">Studio Recommendation</option>
                        <option value="Matte" {{ old('glaze_finish') == 'Matte' ? 'selected' : '' }}>Smooth Matte</option>
                        <option value="Glossy" {{ old('glaze_finish') == 'Glossy' ? 'selected' : '' }}>High Gloss</option>
                        <option value="Crackle" {{ old('glaze_finish') == 'Crackle' ? 'selected' : '' }}>Crackle Texture</option>
                        <option value="Unglazed" {{ old('glaze_finish') == 'Unglazed' ? 'selected' : '' }}>Unglazed / Raw Texture</option>
                    </select>
                    @error('glaze_finish')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Sketch Upload -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Reference Sketch or Inspiration Photo <span class="text-brand">*</span></label>
                <div id="dropzone" class="mt-1 flex justify-center px-6 pt-8 pb-8 border-2 border-slate-200 border-dashed rounded-2xl hover:border-brand hover:bg-brand/5 transition-all group relative cursor-pointer @error('reference_image') border-red-500 bg-red-50 @enderror" onclick="document.getElementById('reference_image').click()">
                    <div class="space-y-3 text-center pointer-events-none flex flex-col items-center">
                        <div class="h-14 w-14 rounded-full bg-slate-100 flex items-center justify-center group-hover:bg-white transition-colors group-hover:shadow-sm">
                            <svg class="h-7 w-7 text-slate-400 group-hover:text-brand transition-colors" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="flex flex-col text-sm text-slate-600 justify-center">
                            <span class="relative cursor-pointer rounded-md font-medium text-brand mb-1">
                                <span>Upload a file</span>
                            </span>
                            <p class="font-light text-slate-500">or drag and drop here</p>
                        </div>
                        <p class="text-xs text-slate-400 bg-slate-100 px-3 py-1 rounded-full group-hover:bg-white transition-colors">PNG, JPG, WEBP up to 5MB</p>
                    </div>
                    <input id="reference_image" name="reference_image" type="file" class="sr-only" accept="image/jpeg, image/png, image/jpg, image/webp">
                </div>
                @error('reference_image')
                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="pt-6">
                <button type="submit" class="w-full flex justify-center py-4 px-4 border border-transparent rounded-xl shadow-lg shadow-brand/30 text-base font-medium text-white bg-brand hover:opacity-90 transition-all">
                    Submit Bespoke Request
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    const fileInput = document.getElementById('reference_image');
    const dropzone = document.getElementById('dropzone');

    fileInput.addEventListener('change', function(e) {
        const fileName = e.target.files[0]?.name;
        if(fileName) {
            const textContainer = dropzone.querySelector('p.text-xs');
            textContainer.innerHTML = `<span class="font-semibold text-brand truncate max-w-xs inline-block align-bottom">${fileName}</span> ready for upload`;
            dropzone.classList.add('border-brand', 'bg-brand/5');
        }
    });

    // Basic drag and drop
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
    function highlight(e) { dropzone.classList.add('border-brand', 'bg-brand/10') }
    function unhighlight(e) { dropzone.classList.remove('border-brand', 'bg-brand/10') }
    dropzone.addEventListener('drop', handleDrop, false)
    function handleDrop(e) {
        fileInput.files = e.dataTransfer.files;
        fileInput.dispatchEvent(new Event('change'));
    }
</script>
@endsection
