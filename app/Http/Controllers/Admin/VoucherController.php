<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vouchers = Voucher::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.vouchers.index', compact('vouchers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.vouchers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Capitalize code before validation
        if ($request->has('code')) {
            $request->merge(['code' => strtoupper($request->code)]);
        }

        $validated = $request->validate([
            'code' => 'required|string|unique:vouchers,code|max:50',
            'type' => 'required|in:fixed,percent',
            'value' => [
                'required',
                'numeric',
                'min:0.01',
                function ($attribute, $value, $fail) use ($request) {
                    if ($request->type === 'percent' && $value > 100) {
                        $fail('Nilai persentase diskon tidak boleh lebih dari 100%.');
                    }
                },
            ],
            'min_booking_amount' => 'required|numeric|min:0',
            'expires_at' => 'nullable|date|after_or_equal:today',
            'usage_limit' => 'nullable|integer|min:1',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active') ? true : false;

        Voucher::create($validated);

        return redirect()->route('admin.vouchers.index')->with('success', 'Voucher berhasil dibuat.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Voucher $voucher)
    {
        return view('admin.vouchers.edit', compact('voucher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Voucher $voucher)
    {
        // Capitalize code before validation
        if ($request->has('code')) {
            $request->merge(['code' => strtoupper($request->code)]);
        }

        $validated = $request->validate([
            'code' => [
                'required',
                'string',
                'max:50',
                Rule::unique('vouchers')->ignore($voucher->id),
            ],
            'type' => 'required|in:fixed,percent',
            'value' => [
                'required',
                'numeric',
                'min:0.01',
                function ($attribute, $value, $fail) use ($request) {
                    if ($request->type === 'percent' && $value > 100) {
                        $fail('Nilai persentase diskon tidak boleh lebih dari 100%.');
                    }
                },
            ],
            'min_booking_amount' => 'required|numeric|min:0',
            'expires_at' => 'nullable|date',
            'usage_limit' => 'nullable|integer|min:1',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active') ? true : false;

        $voucher->update($validated);

        return redirect()->route('admin.vouchers.index')->with('success', 'Voucher berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Voucher $voucher)
    {
        $voucher->delete();
        return redirect()->route('admin.vouchers.index')->with('success', 'Voucher berhasil dihapus.');
    }
}
