<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaxAndDiscount;
use Illuminate\Routing\Controller;

class TaxAndDiscountController extends Controller
{
    public function index()
    {
        $global_pricing = TaxAndDiscount::first();

        $tax = $global_pricing->tax ?? 0;
        $shiping = $global_pricing->shiping ?? 0;
        $discount = $global_pricing->discount ?? 0;

        return view('global_pricing.index', compact('global_pricing', 'tax', 'shiping', 'discount'));
    }

    public function updateTax(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'tax' => 'required|numeric|min:0|max:100',
        ]);

        // Cari data berdasarkan ID
        $taxAndDiscount = TaxAndDiscount::findOrFail($id);

        // Update nilai tax
        $taxAndDiscount->tax = $validated['tax'];
        $taxAndDiscount->save();

        // Kembalikan respons JSON tanpa redirect URL
        return response()->json([
            'success' => 'Tax updated successfully.'
        ]);
    }

    public function updateShiping(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'shiping' => 'required|numeric|min:0|max:100',
        ]);

        // Cari data berdasarkan ID
        $taxAndDiscount = TaxAndDiscount::findOrFail($id);

        // Update nilai tax
        $taxAndDiscount->shiping = $validated['shiping'];
        $taxAndDiscount->save();

        // Kembalikan respons JSON tanpa redirect URL
        return response()->json([
            'success' => 'Shiping updated successfully.'
        ]);
    }

    public function updateDiscount(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'discount' => 'required|numeric|min:0|max:100',
        ]);

        // Cari data berdasarkan ID
        $taxAndDiscount = TaxAndDiscount::findOrFail($id);

        // Update nilai tax
        $taxAndDiscount->discount = $validated['discount'];
        $taxAndDiscount->save();

        // Kembalikan respons JSON tanpa redirect URL
        return response()->json([
            'success' => 'Discount updated successfully.'
        ]);
    }

}
