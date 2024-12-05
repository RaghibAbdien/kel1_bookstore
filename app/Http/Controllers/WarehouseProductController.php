<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;
use App\Models\WarehouseProduct;
use Illuminate\Routing\Controller;

class WarehouseProductController extends Controller
{
    public function index(){
        $data = WarehouseProduct::all();

        return view('warehouse.index', compact('data'));
    }
}
