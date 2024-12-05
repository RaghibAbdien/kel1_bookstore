<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::all();

        return view('stock.index', compact('stocks'));
    }

    public function editStock($id)
    {
        $stocks = Stock::findOrFail($id);
        $warehouses = Warehouse::all();
        $statuses = ['In Stock', 'Out of Stock', 'Need Restock'];

        return view('stock.edit-stock', compact('stocks', 'warehouses', 'statuses'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input form
        $validatedData = $request->validate([
            'product_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'restock_threshold' => 'required|integer|min:0',
            'status' => 'required|in:In Stock,Out of Stock,Need Restock', // Validasi enum status
            'warehouse_id' => 'required|exists:warehouses,id', // Validasi warehouse_id harus valid
        ], [
            'product_name.required' => 'Product Name tidak boleh kosong',
            'quantity.required' => 'Quantity tidak boleh kosong',
            'quantity.integer' => 'Quantity harus berupa angka',
            'restock_threshold.required' => 'Restock Threshold tidak boleh kosong',
            'status.required' => 'Status tidak boleh kosong',
            'status.in' => 'Status harus salah satu dari: In Stock, Out of Stock, Need Restock',
            'warehouse_id.required' => 'Warehouse tidak boleh kosong',
            'warehouse_id.exists' => 'Warehouse yang dipilih tidak valid',
        ]);

        try {
            // Cari data WarehouseProduct berdasarkan ID
            $stock = Stock::findOrFail($id);

            // Update data berdasarkan input dari form
            $stock->update([
                'product_name' => $validatedData['product_name'], // Asumsi: Ada kolom terkait produk di tabel.
                'quantity' => $validatedData['quantity'],
                'restock_threshold' => $validatedData['restock_threshold'],
                'status' => $validatedData['status'],
                'warehouse_id' => $validatedData['warehouse_id'],
            ]);

            return response()->json([
                'success' => 'Stock product updated successfully! Redirecting...',
                'redirect' => '/manage-stock',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Something went wrong: ' . $e->getMessage(),
            ], 500);
        }
    }
}
