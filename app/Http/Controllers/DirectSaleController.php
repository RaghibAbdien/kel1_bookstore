<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DirectSaleController extends Controller
{
    public function index()
    {
        $products = Stock::all();

        return view('direct_sale.index', compact('products'));
    }
}
