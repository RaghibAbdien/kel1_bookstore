<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DirectSaleController extends Controller
{
    public function index()
    {
        $products = Stock::all();
        $customers = User::whereHas('role', function ($query) {
            $query->where('role_name', 'customer');
        })->get();

        return view('direct_sale.index', compact('products', 'customers'));
    }
}
