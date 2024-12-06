<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use App\Models\WarehouseProduct;
use Illuminate\Routing\Controller;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::all();

        return view('stock.index', compact('stocks'));
    }

    public function addStock($id)
    {
        $stocks = Stock::findOrFail($id);

        return view('stock.add-stock', compact('stocks'));
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
            // Cari data Stock berdasarkan ID
            $stock = Stock::findOrFail($id);

            // Hitung jumlah yang akan ditambahkan ke Stock
            $quantityToAdd = $validatedData['quantity'];

            // Cari WarehouseProduct terkait berdasarkan product_id
            $warehouseProduct = WarehouseProduct::where('product_id', $stock->product_id)->first();

            // Validasi: Pastikan stok di gudang cukup
            if (!$warehouseProduct || $warehouseProduct->quantity < $quantityToAdd) {
                return response()->json([
                    'error' => 'Stok di gudang tidak mencukupi untuk menambahkan jumlah ini ke stok toko.',
                ], 400); // Status kode 400 untuk validasi gagal
            }

            // Tambahkan quantity di tabel Stock
            $stock->increment('quantity', $quantityToAdd);

            // Kurangi quantity yang sama pada WarehouseProduct
            WarehouseProduct::updateOrCreateProduct($stock->product_id, $quantityToAdd, 'subtract');

            return response()->json([
                'success' => 'Stock quantity updated successfully! Redirecting to dashboard...',
                'redirect' => route('manage-stock'), // Gunakan route helper
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Something went wrong: ' . $e->getMessage(),
            ], 500); // Status kode 500 untuk error server
        }
    }

    public function editStock($id)
    {
        $stocks = Stock::findOrFail($id);
        $warehouses = Warehouse::all();
        $statuses = ['In Stock', 'Out of Stock', 'Need Restock'];

        return view('stock.edit-stock', compact('stocks', 'warehouses', 'statuses'));
    }

    // public function update(Request $request, $id)
    // {
    //     // Validasi input form
    //     $validatedData = $request->validate([
    //         'product_name' => 'required|string|max:255',
    //         'quantity' => 'required|integer|min:0',
    //         'restock_threshold' => 'required|integer|min:0',
    //         'status' => 'required|in:In Stock,Out of Stock,Need Restock', // Validasi enum status
    //         'warehouse_id' => 'required|exists:warehouses,id', // Validasi warehouse_id harus valid
    //     ], [
    //         'product_name.required' => 'Product Name tidak boleh kosong',
    //         'quantity.required' => 'Quantity tidak boleh kosong',
    //         'quantity.integer' => 'Quantity harus berupa angka',
    //         'restock_threshold.required' => 'Restock Threshold tidak boleh kosong',
    //         'status.required' => 'Status tidak boleh kosong',
    //         'status.in' => 'Status harus salah satu dari: In Stock, Out of Stock, Need Restock',
    //         'warehouse_id.required' => 'Warehouse tidak boleh kosong',
    //         'warehouse_id.exists' => 'Warehouse yang dipilih tidak valid',
    //     ]);

    //     try {
    //         // Cari data WarehouseProduct berdasarkan ID
    //         $stock = Stock::findOrFail($id);

    //         // Update data berdasarkan input dari form
    //         $stock->update([
    //             'product_name' => $validatedData['product_name'], // Asumsi: Ada kolom terkait produk di tabel.
    //             'quantity' => $validatedData['quantity'],
    //             'restock_threshold' => $validatedData['restock_threshold'],
    //             'status' => $validatedData['status'],
    //             'warehouse_id' => $validatedData['warehouse_id'],
    //         ]);

    //         return response()->json([
    //             'success' => 'Stock product updated successfully! Redirecting...',
    //             'redirect' => '/manage-stock',
    //         ]);
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'error' => 'Something went wrong: ' . $e->getMessage(),
    //         ], 500);
    //     }
    // }

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
        // Cari data Stock berdasarkan ID
        $stock = Stock::findOrFail($id);

        // Hitung selisih perubahan quantity
        $quantityDifference = $validatedData['quantity'] - $stock->quantity;

        // Update data Stock
        $stock->update([
            'product_name' => $validatedData['product_name'],
            'quantity' => $validatedData['quantity'],
            'restock_threshold' => $validatedData['restock_threshold'],
            'status' => $validatedData['status'],
            'warehouse_id' => $validatedData['warehouse_id'],
        ]);

        // Sesuaikan stok di WarehouseProduct
        if ($quantityDifference > 0) {
            // Kurangi stok di WarehouseProduct jika stok di toko bertambah
            WarehouseProduct::updateOrCreateProduct($stock->product_id, $quantityDifference, 'subtract');
        } elseif ($quantityDifference < 0) {
            // Tambah stok di WarehouseProduct jika stok di toko berkurang
            WarehouseProduct::updateOrCreateProduct($stock->product_id, abs($quantityDifference), 'add');
        }

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
