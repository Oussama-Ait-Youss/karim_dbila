@extends('layouts.admin')

@section('title', 'Edit Product')

@section('admin_content')
    <div class="max-w-4xl mx-auto">
        <div class="mb-8 flex items-center justify-between">
            <h1 class="text-3xl font-bold text-slate-900 tracking-tight">Edit Product: {{ $product->name }}</h1>
            <a href="{{ route('admin.products.index') }}" class="text-sm font-semibold text-slate-500 hover:text-slate-700 transition-colors">&larr; Back to Catalog</a>
        </div>
        
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-sm rounded-xl border border-slate-200 overflow-hidden">
            @csrf
            @method('PUT')
            <div class="p-8 space-y-8">
                
                <!-- Core Information -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="sm:col-span-2">
                        <label for="name" class="block text-sm font-bold text-slate-700 mb-2">Product Name <span class="text-red-500">*</span></label>
                        <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" required class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all @error('name') border-red-500 ring-red-100 @enderror">
                        @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="price" class="block text-sm font-bold text-slate-700 mb-2">Price ($) <span class="text-red-500">*</span></label>
                        <input type="number" step="0.01" id="price" name="price" value="{{ old('price', $product->price) }}" required class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all @error('price') border-red-500 ring-red-100 @enderror">
                        @error('price') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="stock_count" class="block text-sm font-bold text-slate-700 mb-2">Stock Count <span class="text-red-500">*</span></label>
                        <input type="number" id="stock_count" name="stock_count" value="{{ old('stock_count', $product->stock_count) }}" required class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all @error('stock_count') border-red-500 ring-red-100 @enderror">
                        @error('stock_count') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div>
                    <label for="description" class="block text-sm font-bold text-slate-700 mb-2">Detailed Description <span class="text-red-500">*</span></label>
                    <textarea id="description" name="description" rows="5" required class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all @error('description') border-red-500 ring-red-100 @enderror">{{ old('description', $product->description) }}</textarea>
                    @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Technical Specs -->
                <div class="pt-6 border-t border-slate-100">
                    <h3 class="text-lg font-semibold text-slate-900 mb-4 tracking-tight">Material Specifications</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="dimensions" class="block text-sm font-bold text-slate-700 mb-2">Dimensions <span class="text-slate-400 font-normal">(e.g. 15cm x 10cm)</span></label>
                            <input type="text" id="dimensions" name="dimensions" value="{{ old('dimensions', $product->dimensions) }}" class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all">
                            @error('dimensions') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label for="weight" class="block text-sm font-bold text-slate-700 mb-2">Weight (kg)</label>
                            <input type="number" step="0.01" id="weight" name="weight" value="{{ old('weight', $product->weight) }}" class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all">
                            @error('weight') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label for="clay_type" class="block text-sm font-bold text-slate-700 mb-2">Clay Source</label>
                            <input type="text" id="clay_type" name="clay_type" value="{{ old('clay_type', $product->clay_type) }}" placeholder="Stoneware, Terracotta..." class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all">
                        </div>
                        <div>
                            <label for="glaze_type" class="block text-sm font-bold text-slate-700 mb-2">Glaze Finish</label>
                            <input type="text" id="glaze_type" name="glaze_type" value="{{ old('glaze_type', $product->glaze_type) }}" placeholder="Matte, Glossy, Amber..." class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all">
                        </div>
                        <div class="sm:col-span-2 pt-2">
                            <label class="flex items-center gap-3 cursor-pointer select-none group">
                                <input type="checkbox" name="is_one_of_a_kind" value="1" {{ old('is_one_of_a_kind', $product->is_one_of_a_kind) ? 'checked' : '' }} class="w-5 h-5 text-indigo-600 rounded border-slate-300 focus:ring-indigo-500 transition-colors cursor-pointer">
                                <span class="text-sm font-bold text-slate-700 group-hover:text-indigo-600 transition-colors">1 of 1 Exclusive Piece (Prevents ordering multiple copies)</span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Imagery -->
                <div class="pt-6 border-t border-slate-100">
                    <h3 class="text-lg font-semibold text-slate-900 mb-4 tracking-tight">Product Photography</h3>
                    
                    @if($product->images->count() > 0)
                        <div class="mb-4 flex gap-4 overflow-x-auto py-2">
                            @foreach($product->images as $image)
                                <div class="relative flex-shrink-0">
                                    <img src="{{ asset('storage/' . $image->image_path) }}" class="h-24 w-24 object-cover rounded-lg border border-slate-200">
                                    @if($image->is_primary)
                                        <span class="absolute -top-2 -right-2 bg-indigo-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-full">Primary</span>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                        <p class="text-sm text-amber-600 font-medium mb-4">Note: Uploading new images will replace all existing product images.</p>
                    @endif

                    <div>
                        <label for="images" class="block text-sm font-bold text-slate-700 mb-2">Upload File(s)</label>
                        <input type="file" id="images" name="images[]" multiple accept="image/*" class="w-full text-slate-500 file:mr-4 file:py-3 file:px-6 file:rounded-lg file:border-0 file:text-sm file:font-bold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 cursor-pointer transition-colors border border-slate-300 rounded-lg p-2 @error('images.*') border-red-500 ring-red-100 @enderror">
                        @error('images') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        @error('images.*') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

            </div>
            
            <!-- Action Bar -->
            <div class="px-8 py-6 bg-slate-50 border-t border-slate-200 flex justify-end">
                <button type="submit" class="bg-indigo-600 text-white font-bold tracking-wide px-8 py-3.5 rounded-lg shadow-sm hover:bg-indigo-700 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" /></svg>
                    Update Product
                </button>
            </div>
        </form>
    </div>
@endsection
