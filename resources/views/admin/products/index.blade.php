@extends('layouts.admin')

@section('title', 'Product Catalog')

@section('admin_content')
    <div class="max-w-7xl mx-auto">
        
        <div class="mb-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <h1 class="text-3xl font-bold text-slate-900 tracking-tight">Product Catalog</h1>
            <a href="{{ route('admin.products.create') }}" class="bg-indigo-600 text-white font-bold px-6 py-3 rounded-lg shadow-sm hover:bg-indigo-700 transition-colors flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                Add Product
            </a>
        </div>
                
                <div class="bg-white shadow-sm rounded-xl border border-slate-200 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-slate-200">
                            <thead class="bg-slate-50">
                                <tr>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Product</th>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Price</th>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Inventory</th>
                                    <th scope="col" class="px-6 py-4 text-right text-xs font-bold text-slate-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-slate-100">
                                @forelse($products as $product)
                                    <tr class="hover:bg-slate-50/80 transition-colors">
                                        <td class="px-6 py-5 whitespace-nowrap">
                                            <div class="flex items-center gap-4">
                                                <div class="flex-shrink-0 h-12 w-12 bg-slate-100 rounded-lg overflow-hidden border border-slate-200 flex items-center justify-center">
                                                    @php $primary = $product->images->where('is_primary', true)->first(); @endphp
                                                    @if($primary)
                                                        <img class="h-full w-full object-cover" src="{{ asset('storage/' . $primary->image_path) }}" alt="{{ $product->name }} Thumbnail">
                                                    @else
                                                        <svg class="w-6 h-6 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                                    @endif
                                                </div>
                                                <div>
                                                    <div class="text-sm font-bold text-slate-900">{{ $product->name }}</div>
                                                    <div class="text-xs font-medium text-slate-500 mt-0.5">{{ $product->clay_type ?? 'No Clay Selected' }} &middot; {{ $product->glaze_type ?? 'No Glaze' }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-5 whitespace-nowrap text-sm font-black text-slate-900">
                                            ${{ number_format($product->price, 2) }}
                                        </td>
                                        <td class="px-6 py-5 whitespace-nowrap">
                                            @if($product->stock_count > 0)
                                                <span class="px-3 py-1 inline-flex text-xs font-bold rounded-full bg-emerald-100 text-emerald-800 border border-emerald-200">
                                                    {{ $product->stock_count }} in stock
                                                </span>
                                            @else
                                                <span class="px-3 py-1 inline-flex text-xs font-bold rounded-full bg-red-100 text-red-800 border border-red-200">
                                                    Out of stock
                                                </span>
                                            @endif
                                            
                                            @if($product->is_one_of_a_kind)
                                                <span class="ml-2 px-2 py-1 inline-flex text-[10px] font-bold uppercase tracking-wider rounded-md bg-amber-100 text-amber-800 border border-amber-200">
                                                    1 of 1
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-5 whitespace-nowrap text-right text-sm font-medium">
                                            <div class="flex items-center justify-end gap-3">
                                                <a href="{{ route('admin.products.edit', $product->id) }}" class="text-indigo-600 hover:text-indigo-900 font-bold transition-colors">Edit</a>
                                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product? This action cannot be undone.');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900 font-bold transition-colors">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-16 text-center text-slate-500 flex flex-col items-center">
                                            <div class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center mb-4">
                                                <svg class="w-8 h-8 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
                                            </div>
                                            <span class="text-sm font-medium">No products found in the catalog.</span>
                                            <a href="{{ route('admin.products.create') }}" class="mt-2 text-indigo-600 hover:text-indigo-800 font-bold text-sm">Add your first product &rarr;</a>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    @if($products->hasPages())
                        <div class="px-6 py-4 border-t border-slate-200 bg-slate-50">
                            {{ $products->links() }}
                        </div>
                    @endif
                </div>
    </div>
@endsection
