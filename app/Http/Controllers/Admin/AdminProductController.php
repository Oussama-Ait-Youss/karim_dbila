<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AdminProductController extends Controller
{
    /**
     * Display a table of all existing products.
     */
    public function index(): View
    {
        $products = Product::with('images')->latest()->paginate(15);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Return the product creation form view.
     */
    public function create(): View
    {
        return view('admin.products.create');
    }

    /**
     * Validate and store a new product, including physical image uploads.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'dimensions' => ['nullable', 'string', 'max:255'],
            'weight' => ['nullable', 'numeric', 'min:0'],
            'stock_count' => ['required', 'integer', 'min:0'],
            'clay_type' => ['nullable', 'string', 'max:255'],
            'glaze_type' => ['nullable', 'string', 'max:255'],
            'images' => ['nullable', 'array'],
            'images.*' => ['image', 'mimes:jpeg,png,jpg,webp', 'max:5120'], // Max 5MB per image
        ]);

        $product = Product::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'dimensions' => $validated['dimensions'],
            'weight' => $validated['weight'],
            'stock_count' => $validated['stock_count'],
            'clay_type' => $validated['clay_type'],
            'glaze_type' => $validated['glaze_type'],
            'is_one_of_a_kind' => $request->has('is_one_of_a_kind'),
        ]);

        if ($request->hasFile('images')) {
            $isPrimary = true;
            foreach ($request->file('images') as $image) {
                // Upload physical file to local storage
                $path = $image->store('products', 'public');
                
                // Map the new image path to the database relational table
                $product->images()->create([
                    'image_path' => $path,
                    'is_primary' => $isPrimary,
                ]);
                
                $isPrimary = false; // Only the very first uploaded image gets primary status
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'The product has been securely created and deployed to the catalog.');
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit(Product $product): View
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Validate and update the specified product in storage.
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'dimensions' => ['nullable', 'string', 'max:255'],
            'weight' => ['nullable', 'numeric', 'min:0'],
            'stock_count' => ['required', 'integer', 'min:0'],
            'clay_type' => ['nullable', 'string', 'max:255'],
            'glaze_type' => ['nullable', 'string', 'max:255'],
            'images' => ['nullable', 'array'],
            'images.*' => ['image', 'mimes:jpeg,png,jpg,webp', 'max:5120'],
        ]);

        $product->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'dimensions' => $validated['dimensions'],
            'weight' => $validated['weight'],
            'stock_count' => $validated['stock_count'],
            'clay_type' => $validated['clay_type'],
            'glaze_type' => $validated['glaze_type'],
            'is_one_of_a_kind' => $request->has('is_one_of_a_kind'),
        ]);

        if ($request->hasFile('images')) {
            // Delete old images from storage
            foreach ($product->images as $oldImage) {
                Storage::disk('public')->delete($oldImage->image_path);
            }
            $product->images()->delete();

            $isPrimary = true;
            foreach ($request->file('images') as $image) {
                $path = $image->store('products', 'public');
                $product->images()->create([
                    'image_path' => $path,
                    'is_primary' => $isPrimary,
                ]);
                $isPrimary = false;
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified product and its files from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        foreach ($product->images as $image) {
            Storage::disk('public')->delete($image->image_path);
        }
        
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product and associated files deleted successfully.');
    }
}
