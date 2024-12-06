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

        return view('global_pricing.index', compact('tax', 'shiping', 'discount'));
    }
}
