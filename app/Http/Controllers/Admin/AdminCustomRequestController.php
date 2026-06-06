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
        $customRequests = CustomRequest::with('user')
            ->where('status', 'pending_review')
            ->latest()
            ->paginate(15);

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

        return redirect()->back()->with('success', 'The custom request has been successfully quoted.');
    }
}
