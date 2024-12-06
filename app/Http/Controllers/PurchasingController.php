<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Warehouse;
use App\Models\Purchasing;
use Illuminate\Http\Request;
use App\Models\WarehouseProduct;
use Illuminate\Routing\Controller;

class PurchasingController extends Controller
{
    public function index()
    {
        $purchasings = Purchasing::all();
        $warehouseProducts = WarehouseProduct::all();
        $balances = $warehouseProducts->map(function ($item) {
            
            return $item->balance;
        });

        return view('purchase.index', compact('purchasings', 'balances'));
    }

    public function editPurchase($id)
    {
        $purchasings = Purchasing::findOrFail($id);
        $suppliers = Supplier::all();
        $warehouses = Warehouse::all();
        $statuses = ['In Stock', 'Need Restock'];

        return view('purchase.edit-purchase', compact('purchasings', 'suppliers', 'warehouses', 'statuses'));
    }
}
