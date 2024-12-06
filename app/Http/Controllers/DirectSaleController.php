<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DirectSaleController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('direct_sale.index', compact('products'));
    }
}
