<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Supplier;
use App\Models\Warehouse;
use App\Models\WarehouseProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Purchasing extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($product) {
            // Otomatis Create record pada table warehouseproduct setelah Create Product
            WarehouseProduct::create([
                'product_id' => $product->id,
                'warehouse_id' => 1,
                'quantity' => 0,
                'restock_threshold' => 0,
                'status' => 'Out of Stock',
            ]);
        });
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'warehouse_id');
    }

}
