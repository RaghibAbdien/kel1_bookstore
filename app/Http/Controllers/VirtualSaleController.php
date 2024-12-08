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

        $tax = intval(TaxAndDiscount::where('id', 1)->value('tax'));
        $discount = intval(TaxAndDiscount::where('id', 1)->value('discount'));

        return view('virtual_sale.invoice', compact('bookstore', 'customer_orders', 'variant_product', 'tax', 'discount'));
    }
}
