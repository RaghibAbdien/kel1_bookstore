<?php

namespace App\Http\Controllers;

use App\Models\Bookstore;
use Illuminate\Http\Request;
use App\Models\CustomerOrder;
use App\Models\TaxAndDiscount;
use Illuminate\Routing\Controller;

class VirtualSaleController extends Controller
{
    public function index()
    {
        $bookstores = Bookstore::all();

        return view('virtual_sale.index', compact('bookstores'));
    }

    public function showInvoice($id)
    {
        $bookstore = Bookstore::findOrFail($id);
        $customer_orders = CustomerOrder::where('bookstore_id', $id)->get();

        // Menghitung jumlah total produk
        $variant_product = $customer_orders->count();

        return view('virtual_sale.invoice', compact('bookstore', 'customer_orders', 'variant_product'));
    }

    public function confirmInvoice($id)
    {
        // Cari data Bookstore berdasarkan ID
        $bookstore = Bookstore::find($id);

        // Periksa apakah Bookstore ditemukan
        if (!$bookstore) {
            return redirect()->back()->with('failed', 'Invoice not found!');
        }

        // Update status dan status_delivery menjadi true
        $bookstore->status = true;
        $bookstore->status_delivery = true;

        // Simpan perubahan
        $bookstore->save();

        // Redirect atau beri response sesuai kebutuhan
        return response()->json([
            'success' => 'Invoice confirmed successfully!',
            'redirect' => route('manage-virtual-sale'),
        ]);
    }

}
