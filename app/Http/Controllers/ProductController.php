<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of all products.
     */
    public function index(Request $request): View
    {
        $query = Product::with(['images' => function ($query) {
            $query->where('is_primary', true);
        }])->latest();

        // Filter by category slug if present in URL query string
        if ($request->has('category')) {
            $query->where('category', $request->category);
        }

        // Search name or description if search keyword is submitted
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $products = $query->paginate(16)->appends($request->query());

        return view('products.index', compact('products'));
    }

    /**
     * Display the specified product detail page.
     */
    public function show(Product $product): View
    {
        // Eager load all images for the gallery
        $product->load('images');
        
        // Fetch a few related products for the bottom cross-sell section
        $relatedProducts = Product::with(['images' => function ($query) {
            $query->where('is_primary', true);
        }])->where('id', '!=', $product->id)->inRandomOrder()->take(4)->get();

        return view('products.show', compact('product', 'relatedProducts'));
    }
}
