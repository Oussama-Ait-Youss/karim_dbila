<?php

namespace App\Http\Controllers;

use App\Models\CustomRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Stripe\Exception\SignatureVerificationException;
use Stripe\Webhook;

class StripeWebhookController extends Controller
{
    /**
     * Handle incoming Stripe webhook events.
     */
    public function handleWebhook(Request $request)
    {
        $endpointSecret = config('services.stripe.webhook_secret') ?? env('STRIPE_WEBHOOK_SECRET');
        $payload = $request->getContent();
        $sigHeader = $request->header('Stripe-Signature');

        try {
            if ($endpointSecret && $sigHeader) {
                // Securely verify the event signature
                $event = Webhook::constructEvent($payload, $sigHeader, $endpointSecret);
            } else {
                // Fallback decode for local testing if secrets are not configured yet
                $event = json_decode($payload);
            }
        } catch (\UnexpectedValueException | SignatureVerificationException $e) {
            Log::error('Stripe Webhook Verification Failed: ' . $e->getMessage());
            return response()->json(['error' => 'Invalid payload or signature'], 400);
        }

        // Handle the checkout.session.completed event
        if ($event->type === 'checkout.session.completed') {
            $session = $event->data->object;
            $sessionId = $session->id;

            // Find the corresponding custom request
            $customRequest = CustomRequest::where('stripe_payment_intent_id', $sessionId)->first();

            if ($customRequest) {
                // Mark the request as paid
                $customRequest->update([
                    'status' => 'paid'
                ]);
                
                Log::info('CustomRequest #' . $customRequest->id . ' marked as paid successfully via Webhook.');
            } else {
                Log::warning('Stripe Webhook: Could not find CustomRequest for session ID ' . $sessionId);
            }
        }

        // Return a clean 200 response to acknowledge receipt to Stripe
        return response()->json(['status' => 'success'], 200);
    }
}
