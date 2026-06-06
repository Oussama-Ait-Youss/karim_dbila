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
    public function index(): View
    {
        // Eager load primary images and paginate cleanly
        $products = Product::with(['images' => function ($query) {
            $query->where('is_primary', true);
        }])->latest()->paginate(16);

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
