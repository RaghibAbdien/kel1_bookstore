<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarehouseProduct extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'warehouseproduct';

    public function getBalanceAttribute()
    {
        return $this->quantity - $this->restock_threshold;
    }

    public static function updateOrCreateProduct($productId, $quantity, $operation = 'add')
    {
        // Cari atau buat entri WarehouseProduct berdasarkan product_id
        $warehouseProduct = self::firstOrNew(['product_id' => $productId]);

        if ($operation === 'subtract') {
            // Validasi apakah cukup stok di WarehouseProduct sebelum pengurangan
            if ($warehouseProduct->exists && $warehouseProduct->quantity >= $quantity) {
                $warehouseProduct->quantity -= $quantity; // Mengurangi stok
            } else {
                throw new \Exception("Insufficient stock in WarehouseProduct for product ID: $productId");
            }
        } elseif ($operation === 'add') {
            // Penambahan stok untuk proses purchase
            // Anda bisa menambahkan logika lebih spesifik di sini jika diperlukan, misalnya log pembelian
            $warehouseProduct->quantity += $quantity; // Menambah stok
        } else {
            throw new \InvalidArgumentException("Invalid operation: Only 'add' or 'subtract' are allowed.");
        }

        // Simpan perubahan
        $warehouseProduct->save();
    }
    
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'warehouse_id');
    }
}
