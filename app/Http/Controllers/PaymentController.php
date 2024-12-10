<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Models\PaymentProduct;
use App\Models\TaxAndDiscount;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
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
            $payment = Payment::create([
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

                PaymentProduct::create([
                    'payment_id' => $payment->id,
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
                'redirect' => route('show-direct-invoice', ['id' => $payment->id])
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'errors' => ['message' => $e->getMessage()]
            ], 422);
        }
    }

    public function showInvoice($id)
    {
        $payment = Payment::findOrFail($id);
        $payment_products = PaymentProduct::where('payment_id', $id)->get();
    
        // Menghitung jumlah total produk
        $variant_product = $payment_products->count();

        $tax = intval(TaxAndDiscount::where('id', 1)->value('tax'));
        $discount = intval(TaxAndDiscount::where('id', 1)->value('discount'));

        return view('direct_sale.invoice', compact('payment', 'payment_products', 'variant_product', 'tax', 'discount'));
    }

}