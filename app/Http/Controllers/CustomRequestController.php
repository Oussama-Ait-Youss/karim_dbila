<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomRequest;
use App\Models\CustomRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
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
    public function store(StoreCustomRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $path = $request->file('sketch_image')->store('sketches', 'public');

        CustomRequest::create([
            'user_id' => Auth::id(),
            'description' => $validated['description'],
            'requested_height' => $validated['requested_height'] ?? null,
            'requested_diameter' => $validated['requested_diameter'] ?? null,
            'clay_type' => $validated['clay_type'] ?? null,
            'glaze_type' => $validated['glaze_type'] ?? null,
            'sketch_image_path' => $path,
            'status' => 'pending_review',
        ]);

        return redirect()->back()->with('success', 'Your custom bespoke pottery request has been submitted successfully and is pending review.');
    }
}
