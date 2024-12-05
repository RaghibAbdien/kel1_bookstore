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
        $variants = Variant::pluck('id')->toArray(); 

        $infoRole = $request->validate([
            'product_name' => 'required|string|max:255',
            'variant_id' => 'required|in:' . implode(',', $variants),
        ], [
            'product_name.required' => 'Name tidak boleh kosong',
            'variant_id.required' => 'Variant tidak boleh kosong',
        ]);

        try {
            $product = Product::create([
                'product_name' => $infoRole['product_name'],
                'variant_id' => $infoRole['variant_id'],
            ]);

            return response()->json([
                'success' => 'Product added successfully! Redirecting to dashboard...',
                'redirect' => '/manage-catalog'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Something went wrong: ' . $e->getMessage()
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
    // Ambil semua id variant yang ada
    $variants = Variant::pluck('id')->toArray(); 
    
    // Cari produk berdasarkan id
    $products = Product::findOrFail($id); 

    // Validasi input dari form
    $infoRole = $request->validate([
        'product_name' => 'required|string|max:255',
        'variant_id' => 'required|in:' . implode(',', $variants),
    ], [
        'product_name.required' => 'Product Name tidak boleh kosong',
        'variant_id.required' => 'Variant tidak boleh kosong',
    ]);

    try {
        // Update data produk
        $products->update([
            'product_name' => $infoRole['product_name'],
            'variant_id' => $infoRole['variant_id'],
        ]);

        // Mengembalikan response sukses
        return response()->json([
            'success' => 'Product updated successfully! Redirecting to dashboard...',
            'redirect' => '/manage-catalog'
        ]);
    } catch (\Exception $e) {
        // Mengembalikan error jika ada kesalahan
        return response()->json([
            'error' => 'Something went wrong: ' . $e->getMessage()
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
