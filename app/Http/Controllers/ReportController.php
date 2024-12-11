<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Report;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\PaymentProduct;
use App\Models\TaxAndDiscount;
use Illuminate\Routing\Controller;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::all();
        return view('report.index', compact('reports'));
    }

    public function detailReport($id)
    {
        $report = Report::findOrFail($id);
        $employee = $report->employee;
        $role_employee = User::where('name', $employee)->first();
        $role_name = $role_employee->role->role_name;
        $paymentId = $report->payment_id;
        $payment = Payment::where('id', $paymentId)->first();
        $payment_products = PaymentProduct::where('id', $paymentId)->get();
    
        // Menghitung jumlah total produk
        $variant_product = $payment_products->count();

        $tax = intval(TaxAndDiscount::where('id', 1)->value('tax'));
        $discount = intval(TaxAndDiscount::where('id', 1)->value('discount'));

        return view('report.invoice', compact('employee', 'role_name', 'payment' ,'payment_products', 'variant_product', 'tax', 'discount'));
    }
}
