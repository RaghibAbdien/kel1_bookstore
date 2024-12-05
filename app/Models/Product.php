<?php

namespace App\Models;

use App\Models\Variant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function variant()
    {
        return $this->belongsTo(Variant::class, 'variant_id');
    }

    protected static function boot()
    {
        parent::boot();

        // Otomatis Create record pada table WarehouseProduct setelah Create Product
        static::created(function ($product) {
            WarehouseProduct::create([
                'product_id' => $product->id,
                'warehouse_id' => 1,
                'quantity' => 0,
                'restock_threshold' => 0,
                'status' => 'Out of Stock',
            ]);

            Stock::create([
                'product_id' => $product->id,
                'warehouse_id' => 1,
                'quantity' => 0,
                'restock_threshold' => 0,
                'status' => 'Out of Stock',
            ]);
        });
    }

    public function warehouseproduct()
    {
        return $this->hasMany(WarehouseProduct::class, 'product_id');
    }

    public function stock()
    {
        return $this->hasMany(Product::class, 'product_id');
    }
}
