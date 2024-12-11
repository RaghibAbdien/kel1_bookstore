<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Report;
use App\Models\Payment;
use App\Models\Bookstore;
use Illuminate\Http\Request;
use App\Models\CustomerOrder;
use App\Models\PaymentProduct;
use App\Models\TaxAndDiscount;
use Illuminate\Routing\Controller;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::all();
        $directCount = Report::where('transaction', 'Direct Sale')->count();
        $virtualCount = Report::where('transaction', 'Virtual Sale')->count();
        $stockCount = Report::where('transaction', 'Stock')->count();
        $purchaseCount = Report::where('transaction', 'Purchasing')->count();
        return view('report.index', compact('reports', 'directCount', 'virtualCount', 'stockCount', 'purchaseCount'));
    }

    public function detailReport($id)
    {
        $report = Report::findOrFail($id);
        $transaction = $report->transaction;
        $employee = $report->employee;
        $role_employee = User::where('name', $employee)->first();
        $role_name = $role_employee->role->role_name;
        $paymentId = $report->payment_id;
        $payment = Payment::where('id', $paymentId)->first();
        $bookstoreId = $report->bookstore_id;
        $bookstore = Bookstore::where('id', $bookstoreId)->first();
        $payment_products = PaymentProduct::where('id', $paymentId)->get();
        $customer_orders = CustomerOrder::where('id', $bookstoreId)->get();
    
        // Menghitung jumlah total produk
        $variant_direct = $payment_products->count();
        $variant_virtual = $customer_orders->count();

        $tax = intval(TaxAndDiscount::where('id', 1)->value('tax'));
        $discount = intval(TaxAndDiscount::where('id', 1)->value('discount'));

        return view('report.invoice', compact('transaction','employee', 'role_name', 'payment', 'bookstore' ,'payment_products', 'customer_orders', 'variant_direct', 'variant_virtual', 'tax', 'discount'));
    }
}
