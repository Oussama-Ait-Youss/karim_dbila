<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminCustomRequestController extends Controller
{

    /**
     * List all incoming pending custom requests.
     */
    public function index(): View
    {
        // Fetches every single request dynamically so nothing vanishes from the archive log view
        $customRequests = CustomRequest::latest()->paginate(15);

        return view('admin.custom_requests.index', compact('customRequests'));
    }

    /**
     * Assign a quote to a pending custom request.
     */
    public function assignQuote(Request $request, CustomRequest $customRequest): RedirectResponse
    {
        $request->validate([
            'quoted_price' => ['required', 'numeric', 'min:0'],
        ]);

        $customRequest->update([
            'quoted_price' => $request->input('quoted_price'),
            'status' => 'quoted',
        ]);

        // AUTOMATED NOTIFICATIONS: Dispatch Email
        \Illuminate\Support\Facades\Mail::raw(
            "Great news {$customRequest->customer_name}! Your custom pottery request has been reviewed. Your official quote is $" . number_format($customRequest->quoted_price, 2) . ". Please log in to complete your checkout.",
            function ($message) use ($customRequest) {
                $message->to($customRequest->customer_email)
                        ->subject('Your Bespoke Pottery Quote is Ready!');
            }
        );

        // AUTOMATED NOTIFICATIONS: Dispatch WhatsApp (Simulated via System Log until API Integration)
        if ($customRequest->customer_phone) {
            \Illuminate\Support\Facades\Log::info("WHATSAPP DISPATCH: Message sent to " . $customRequest->customer_phone, [
                'client' => $customRequest->customer_name,
                'quote' => $customRequest->quoted_price
            ]);
        }

        return redirect()->back()->with('success', 'The custom request has been quoted and notifications have been dispatched.');
    }
}
