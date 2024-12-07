<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Stock;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Models\TaxAndDiscount;
use Illuminate\Routing\Controller;

class DirectSaleController extends Controller
{
    public function index()
    {
        $products = Stock::all();
        $customers = User::whereHas('role', function ($query) {
            $query->where('role_name', 'customer');
        })->get();

        $global_pricing = TaxAndDiscount::first();
        $tax = $global_pricing->tax ?? 0;
        $shiping = $global_pricing->shiping ?? 0;
        $discount = $global_pricing->discount ?? 0;

        $payment_methods = PaymentMethod::all();

        return view('direct_sale.index', compact('products', 'customers', 'tax', 'shiping', 'discount', 'payment_methods'));
    }
}
