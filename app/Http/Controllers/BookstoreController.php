<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Stock;
use App\Models\Payment;
use App\Models\Bookstore;
use Illuminate\Http\Request;
use App\Models\CustomerOrder;
use App\Models\PaymentMethod;
use App\Models\PaymentProduct;
use App\Models\TaxAndDiscount;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class BookstoreController extends Controller
{

    public function index()
    {
        return view('bookstore.index');
    }

    public function bookstore()
    {
        $products = Stock::all();
        $customers = User::whereHas('role', function ($query) {
            $query->where('role_name', 'customer');
        })->get();

        $global_pricing = TaxAndDiscount::first();
        $tax = $global_pricing->tax ?? 0;
        $shiping = $global_pricing->shiping ?? 0;
        $discount = $global_pricing->discount ?? 0;

        $payment_methods = PaymentMethod::whereIn('payment_method_name', ['Pay Later', 'Debit Card', 'COD'])->get();

        return view('bookstore.bookstore', compact('products', 'customers', 'tax', 'shiping', 'discount', 'payment_methods'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'total_amount' => 'required|numeric',
            'discount' => 'required|numeric',
            'estimated_tax' => 'required|numeric',
            'grand_amount' => 'required|numeric',
            'payment_method_id' => 'required|exists:payment_methods,id',
            'product_id' => 'required|array',
            'product_id.*' => 'exists:products,id',
            'quantity' => 'required|array',
            'quantity.*' => 'integer|min:1',
            'sub_total' => 'required|array',
            'sub_total.*' => 'numeric',
        ]);

        DB::beginTransaction();

        try {
            // Cek payment_method_name berdasarkan payment_method_id
            $paymentMethod = PaymentMethod::find($request->payment_method_id);
            if (!$paymentMethod) {
                throw new \Exception('Payment method not found');
            }

            // Tentukan status
            $status = $paymentMethod->payment_method_name === 'COD' ? false : true;

            // Simpan data ke tabel payments
            $bookstore = Bookstore::create([
                'user_id' => $request->user_id,
                'total_amount' => $request->total_amount,
                'discount' => $request->discount,
                'estimated_tax' => $request->estimated_tax,
                'grand_amount' => $request->grand_amount,
                'payment_method_id' => $request->payment_method_id,
                'status' => $status,
            ]);

            // Simpan data ke tabel payment_products dan update stok
            foreach ($request->product_id as $index => $productId) {
                if (!isset($request->quantity[$index]) || !isset($request->sub_total[$index])) {
                    throw new \Exception('Invalid product data');
                }

                CustomerOrder::create([
                    'bookstore_id' => $bookstore->id,
                    'product_id' => $productId,
                    'quantity' => $request->quantity[$index],
                    'sub_total' => $request->sub_total[$index],
                ]);

                $stock = Stock::where('product_id', $productId)->first();
                if (!$stock) {
                    throw new \Exception('Stock not found for product ID ' . $productId);
                }

                if ($stock->quantity < $request->quantity[$index]) {
                    throw new \Exception('Insufficient stock for product ID ' . $productId);
                }

                $stock->quantity -= $request->quantity[$index];
                $stock->save();
            }

            DB::commit();

            return response()->json([
                'success' => 'Payment and products saved successfully.',
                'redirect' => route('show-bookstore-invoice', ['id' => $bookstore->id])
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'errors' => ['message' => $e->getMessage()]
            ], 422);
        }
    }

    public function showBookstoreInvoice($id)
    {
        $bookstore = Bookstore::findOrFail($id);
        $customer_orders = CustomerOrder::where('bookstore_id', $id)->get();
    
        // Menghitung jumlah total produk
        $variant_product = $customer_orders->count();

        $tax = intval(TaxAndDiscount::where('id', 1)->value('tax'));
        $discount = intval(TaxAndDiscount::where('id', 1)->value('discount'));

        return view('bookstore.invoice', compact('bookstore', 'customer_orders', 'variant_product', 'tax', 'discount'));
    }  

    public function orderHistory()
    {
        $customer_orders = CustomerOrder::with('bookstore')->get();
        $statusConfirmed = Bookstore::where('status_delivery', true)->count();
        $statusUnConfirmed = Bookstore::where('status_delivery', false)->count();
        $statusCount = $statusConfirmed + $statusUnConfirmed;

        return view('bookstore.order-history', compact('customer_orders', 'statusCount', 'statusConfirmed', 'statusUnConfirmed'));
    }
}
