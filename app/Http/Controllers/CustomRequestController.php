<?php

namespace App\Http\Controllers;

use App\Models\CustomRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class CustomRequestController extends Controller
{
    /**
     * Show the form for creating a new custom bespoke request.
     */
    public function create(): View
    {
        return view('custom_requests.create');
    }

    /**
     * Store a newly created custom bespoke request in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'customer_name'   => 'required|string|max:255',
            'customer_email'  => 'required|email|max:255',
            'customer_phone'  => 'nullable|string|max:20',
            'design_vision'   => 'required|string|min:10|max:2000',
            'height'          => 'nullable|numeric|min:1|max:500',
            'diameter'        => 'nullable|numeric|min:1|max:500',
            'clay_type'       => 'required|string',
            'glaze_finish'    => 'required|string',
            'reference_image' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        if ($request->hasFile('reference_image')) {
            $file = $request->file('reference_image');
            $path = $file->store('custom_requests', 'public');
            $validated['reference_image'] = $path;
        }

        CustomRequest::create([
            'customer_name'   => $validated['customer_name'],
            'customer_email'  => $validated['customer_email'],
            'customer_phone'  => $validated['customer_phone'],
            'design_vision'   => $validated['design_vision'],
            'height'          => $validated['height'],
            'diameter'        => $validated['diameter'],
            'clay_type'       => $validated['clay_type'],
            'glaze_finish'    => $validated['glaze_finish'],
            'reference_image' => $validated['reference_image'] ?? null,
        ]);

        return redirect()->back()->with('success', 'Your bespoke pottery request has been submitted successfully! Our artisan team will review your specs and contact you via email shortly.');
    }
}
