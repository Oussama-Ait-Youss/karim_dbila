<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{
    /**
     * Display the cart checkout preview summary.
     */
    public function index(): View
    {
        $cart = session()->get('cart', []);
        
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('cart.index', compact('cart', 'total'));
    }

    /**
     * Add a product to the session-based shopping cart.
     */
    public function add(Request $request, Product $product): RedirectResponse
    {
        $cart = session()->get('cart', []);

        // Rule: Block duplication if it's a one-of-a-kind piece
        if ($product->is_one_of_a_kind && isset($cart[$product->id])) {
            return redirect()->back()->with('error', 'This unique 1-of-1 piece is already in your cart!');
        }

        if (isset($cart[$product->id])) {
            // Increment quantity for regular products
            $cart[$product->id]['quantity']++;
        } else {
            // Fetch primary image path
            $primaryImage = $product->images()->where('is_primary', true)->first();
            
            // Append to session array
            $cart[$product->id] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $primaryImage ? $primaryImage->image_path : null,
                'is_one_of_a_kind' => $product->is_one_of_a_kind,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', "{$product->name} has been added to your cart!");
    }
}
