<?php

namespace App\Http\Controllers;

use App\Models\CustomRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class PaymentController extends Controller
{
    /**
     * Initiate a Stripe Checkout Session for a quoted custom request.
     */
    public function checkoutCustomRequest(CustomRequest $customRequest): RedirectResponse
    {
        // 1. Ensure the authenticated user owns this request
        if ($customRequest->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // 2. Ensure the request has actually been quoted and is ready for payment
        if ($customRequest->status !== 'quoted' || empty($customRequest->quoted_price)) {
            return redirect()->back()->with('error', 'This request is not ready for payment yet.');
        }

        try {
            // 3. Initialize Stripe
            Stripe::setApiKey(config('services.stripe.secret') ?? env('STRIPE_SECRET'));

            // 4. Create the Checkout Session
            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => 'Bespoke Custom Pottery Piece',
                            'description' => 'Custom Request #' . $customRequest->id . ' - ' . substr($customRequest->description, 0, 100),
                        ],
                        'unit_amount' => (int) ($customRequest->quoted_price * 100), // Convert to cents
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => route('custom-requests.success', ['customRequest' => $customRequest->id]),
                'cancel_url' => route('custom-requests.cancel', ['customRequest' => $customRequest->id]),
            ]);

            // 5. Save the generated Stripe Session ID into our database
            $customRequest->update([
                'stripe_payment_intent_id' => $session->id,
            ]);

            // 6. Redirect the user securely to the Stripe hosted checkout page
            return redirect()->away($session->url);

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Unable to initiate payment: ' . $e->getMessage());
        }
    }
}
