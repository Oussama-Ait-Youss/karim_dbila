<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display the dynamic homepage with featured products.
     */
    public function index(): View
    {
        // Fetch featured products dynamically (limit to 8 for the grid)
        $featuredProducts = Product::with(['images' => function ($query) {
            $query->where('is_primary', true);
        }])->latest()->take(8)->get();

        return view('home', compact('featuredProducts'));
    }
}
