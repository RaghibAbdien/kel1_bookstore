<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('catalog.index', compact('products'));
    }

    public function addProduct()
    {
        $variants = Variant::all();

        return view('catalog.add-product', compact('variants'));
    }

    public function store(Request $request)
    {
        $infoRole = $request->validate([
            'product_name' => 'required|string|max:255',
            'variant_id' => 'required|exists:variants,id',
            'supplier_price' => 'required|numeric',
            'product_price' => 'required|numeric',
        ], [
            'product_name.required' => 'Name tidak boleh kosong',
            'variant_id.required' => 'Variant tidak boleh kosong',
            'variant_id.exists' => 'Variant yang dipilih tidak valid',
            'supplier_price.required' => 'Supplier Price tidak boleh kosong',
            'supplier_price.numeric' => 'Supplier Price harus berupa angka',
            'product_price.required' => 'Price tidak boleh kosong',
            'product_price.numeric' => 'Price harus berupa angka',
        ]);

        try {
            $product = Product::create([
                'product_name' => $infoRole['product_name'],
                'variant_id' => $infoRole['variant_id'],
                'supplier_price' => $infoRole['supplier_price'],
                'product_price' => $infoRole['product_price'],
            ]);

            return response()->json([
                'success' => 'Product added successfully! Redirecting to dashboard...',
                'redirect' => '/manage-catalog'
            ]);
        } catch (\Exception $e) {
            \Log::error('Error adding product: ' . $e->getMessage());

            return response()->json([
                'error' => 'Something went wrong. Please try again later.'
            ], 500);
        }
    }


    public function editProduct($id)
    {
        $products = Product::findOrFail($id);
        $variants = Variant::all(); 

        return view('catalog.edit-product', compact('products','variants'));
    }

    public function update(Request $request, $id)
{
    // Cari produk berdasarkan id
    $product = Product::findOrFail($id);

    // Validasi input dari form
    $infoRole = $request->validate([
        'product_name' => 'required|string|max:255',
        'variant_id' => 'required|exists:variants,id',
        'product_price' => 'required|numeric',
    ], [
        'product_name.required' => 'Product Name tidak boleh kosong',
        'variant_id.required' => 'Variant tidak boleh kosong',
        'variant_id.exists' => 'Variant yang dipilih tidak valid',
        'product_price.required' => 'Price tidak boleh kosong',
        'product_price.numeric' => 'Price harus berupa angka',
    ]);

    try {
        // Update data produk
        $product->update([
            'product_name' => $infoRole['product_name'],
            'variant_id' => $infoRole['variant_id'],
            'product_price' => $infoRole['product_price'],
        ]);

        // Mengembalikan response sukses
        return response()->json([
            'success' => 'Product updated successfully! Redirecting to dashboard...',
            'redirect' => '/manage-catalog'
        ]);
    } catch (\Exception $e) {
        // Logging error untuk debugging
        \Log::error('Error updating product: ' . $e->getMessage());

        // Mengembalikan error jika ada kesalahan
        return response()->json([
            'error' => 'Something went wrong. Please try again later.'
        ], 500);
    }
}



    public function delete($id)
    {
        $data = Product::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Product delete successfully.');
    }
}
