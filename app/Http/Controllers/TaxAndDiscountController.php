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

        return view('global_pricing.index', compact('global_pricing'));
    }
}
