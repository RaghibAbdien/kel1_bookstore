<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Report;
use App\Models\Payment;
use App\Models\Variant;
use App\Models\Bookstore;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $employee = User::where('role_id', '!=', 2)->count();
        $customer = User::where('role_id', 2)->count();
        $product = Variant::all()->count();
        $transaction = Report::count();
        $sales = Payment::sum('grand_amount');
        $orders = Bookstore::sum('grand_amount');
        return view('index', compact('employee', 'customer','product', 'transaction', 'sales', 'orders'));
    }
}
