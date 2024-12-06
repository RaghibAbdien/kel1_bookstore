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
        return intval($this->quantity - $this->restock_threshold);
    }

    public static function updateOrCreateProduct($productId, $quantity, $operation = 'add')
    {
        // Cari atau buat entri WarehouseProduct berdasarkan product_id
        $warehouseProduct = self::firstOrNew(['product_id' => $productId]);
    
        if ($operation === 'add') {
            // Tambahkan stok
            $warehouseProduct->quantity += $quantity;
        } else {
            throw new \InvalidArgumentException("Invalid operation: Only 'add' is allowed in this context");
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
