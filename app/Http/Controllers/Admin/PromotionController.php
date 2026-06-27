<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PromotionController extends Controller
{
    /**
     * Display a listing of promotions.
     */
    public function index()
    {
        $promotions = Promotion::latest()->paginate(10);
        
        return view('admin.promotions.index', compact('promotions'));
    }

    /**
     * Show the form for creating a new promotion.
     */
    public function create()
    {
        return view('admin.promotions.create');
    }

    /**
     * Store a newly created promotion.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'discount' => 'nullable|integer|min:0|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'status' => 'required|in:active,inactive',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('promotions', 'public');
            $validated['image'] = $imagePath;
        }

        Promotion::create($validated);

        return redirect()->route('admin.promotions.index')->with('success', 'Promotion created successfully.');
    }

    /**
     * Show the form for editing the specified promotion.
     */
    public function edit(Promotion $promotion)
    {
        return view('admin.promotions.edit', compact('promotion'));
    }

    /**
     * Update the specified promotion.
     */
    public function update(Request $request, Promotion $promotion)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'discount' => 'nullable|integer|min:0|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'status' => 'required|in:active,inactive',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($promotion->image) {
                Storage::disk('public')->delete($promotion->image);
            }
            $imagePath = $request->file('image')->store('promotions', 'public');
            $validated['image'] = $imagePath;
        }

        $promotion->update($validated);

        return redirect()->route('admin.promotions.index')->with('success', 'Promotion updated successfully.');
    }

    /**
     * Remove the specified promotion.
     */
    public function destroy(Promotion $promotion)
    {
        if ($promotion->image) {
            Storage::disk('public')->delete($promotion->image);
        }
        
        $promotion->delete();

        return redirect()->route('admin.promotions.index')->with('success', 'Promotion deleted successfully.');
    }

    /**
     * Update the status of a promotion.
     */
    public function updateStatus(Request $request, Promotion $promotion)
    {
        $validated = $request->validate([
            'status' => 'required|in:active,inactive',
        ]);

        $promotion->update(['status' => $validated['status']]);

        return redirect()->back()->with('success', 'Promotion status updated successfully.');
    }
}
