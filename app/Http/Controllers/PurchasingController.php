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

        // Membuat array balances berdasarkan product_id
        $balances = WarehouseProduct::all()->mapWithKeys(function ($item) {
            return [$item->product_id => $item->balance];
        });

        return view('purchase.index', compact('purchasings', 'balances'));
    }

    public function addPurchase($id)
    {
        $purchasings = Purchasing::findOrFail($id);

        return view('purchase.add-purchase', compact('purchasings'));
    }

    public function store(Request $request, $id)
    {
        // Validasi input form hanya untuk 'quantity'
        $validatedData = $request->validate([
            'quantity' => 'required|integer|min:1', // Minimal 1 untuk memastikan hanya penambahan
        ], [
            'quantity.required' => 'Quantity tidak boleh kosong',
            'quantity.integer' => 'Quantity harus berupa angka',
            'quantity.min' => 'Quantity harus lebih besar dari 0',
        ]);
    
        try {
            // Cari data Purchasing berdasarkan ID
            $purchasing = Purchasing::findOrFail($id);
    
            // Hitung jumlah yang akan ditambahkan
            $addedQuantity = $validatedData['quantity'];
    
            // Update kolom quantity dengan penambahan (bukan mengganti)
            $purchasing->increment('quantity', $addedQuantity);
    
            // Tambahkan quantity yang sama ke warehouse product
            WarehouseProduct::updateOrCreateProduct($purchasing->product_id, $addedQuantity, 'add');
    
            return response()->json([
                'success' => 'Purchase quantity updated successfully! Redirecting to dashboard...',
                'redirect' => '/manage-purchase'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Something went wrong: ' . $e->getMessage()
            ], 500);
        }
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
            'status' => 'required|in:In Stock,Need Restock',
            'warehouse_id' => 'required|exists:warehouses,id',
            'supplier_id' => 'required|exists:suppliers,id',
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
            // Cari data Purchasing berdasarkan ID
            $purchase = Purchasing::findOrFail($id);

            // Ambil quantity lama
            $oldQuantity = $purchase->quantity;

            // Update data berdasarkan input dari form
            $purchase->update([
                'product_name' => $validatedData['product_name'],
                'quantity' => $validatedData['quantity'],
                'status' => $validatedData['status'],
                'warehouse_id' => $validatedData['warehouse_id'],
                'supplier_id' => $validatedData['supplier_id'],
            ]);

            // Hitung selisih quantity
            $quantityDifference = $validatedData['quantity'] - $oldQuantity;

            // Update quantity di WarehouseProduct
            $warehouseProduct = WarehouseProduct::where('product_id', $purchase->product_id)
                ->where('warehouse_id', $purchase->warehouse_id)
                ->first();

            if ($warehouseProduct) {
                $warehouseProduct->update([
                    'quantity' => $warehouseProduct->quantity + $quantityDifference,
                ]);
            }

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
