<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Warehouse;
use App\Models\Purchasing;
use Illuminate\Http\Request;
use App\Models\WarehouseProduct;
use Illuminate\Routing\Controller;

class PurchasingController extends Controller
{
    public function index()
    {
        $purchasings = Purchasing::all();
        $warehouseProducts = WarehouseProduct::all();
        $balances = $warehouseProducts->map(function ($item) {
            
            return $item->balance;
        });

        return view('purchase.index', compact('purchasings', 'balances'));
    }

    public function editPurchase($id)
    {
        $purchasings = Purchasing::findOrFail($id);
        $suppliers = Supplier::all();
        $warehouses = Warehouse::all();
        $statuses = ['In Stock', 'Need Restock'];

        return view('purchase.edit-purchase', compact('purchasings', 'suppliers', 'warehouses', 'statuses'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input form
        $validatedData = $request->validate([
            'product_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'status' => 'required|in:In Stock,Need Restock', // Validasi enum status
            'warehouse_id' => 'required|exists:warehouses,id', // Validasi warehouse_id harus valid
            'supplier_id' => 'required|exists:suppliers,id', // Validasi warehouse_id harus valid
        ], [
            'product_name.required' => 'Product Name tidak boleh kosong',
            'quantity.required' => 'Quantity tidak boleh kosong',
            'quantity.integer' => 'Quantity harus berupa angka',
            'status.required' => 'Status tidak boleh kosong',
            'status.in' => 'Status harus salah satu dari: In Stock, Need Restock',
            'warehouse_id.required' => 'Warehouse tidak boleh kosong',
            'warehouse_id.exists' => 'Warehouse yang dipilih tidak valid',
            'supplier_id.required' => 'Supplier tidak boleh kosong',
            'supplier_id.exists' => 'Supplier yang dipilih tidak valid',
        ]);

        try {
            // Cari data WarehouseProduct berdasarkan ID
            $purchase = Purchasing::findOrFail($id);

            // Update data berdasarkan input dari form
            $purchase->update([
                'product_name' => $validatedData['product_name'], // Asumsi: Ada kolom terkait produk di tabel.
                'quantity' => $validatedData['quantity'],
                'status' => $validatedData['status'],
                'warehouse_id' => $validatedData['warehouse_id'],
                'supplier_id' => $validatedData['supplier_id'],
            ]);

            return response()->json([
                'success' => 'Purchase product updated successfully! Redirecting...',
                'redirect' => '/manage-purchase',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Something went wrong: ' . $e->getMessage(),
            ], 500);
        }
    }
}
