<?php

namespace App\Models;

use App\Models\Stock;
use App\Models\Product;
use App\Models\Variant;
use App\Models\Purchasing;
use App\Models\WarehouseProduct;
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

        static::created(function ($product) {
            // Cek dan buat entri WarehouseProduct jika belum ada
            WarehouseProduct::firstOrCreate(
                ['product_id' => $product->id],
                [
                    'warehouse_id' => 1,
                    'quantity' => 0,
                    'restock_threshold' => 0,
                    'status' => 'Out of Stock',
                ]
            );

            // Cek dan buat entri Stock jika belum ada
            Stock::firstOrCreate(
                ['product_id' => $product->id],
                [
                    'warehouse_id' => 1,
                    'quantity' => 0,
                    'restock_threshold' => 0,
                    'status' => 'Out of Stock',
                ]
            );

            // Cek dan buat entri Purchasing jika belum ada
            Purchasing::firstOrCreate(
                ['product_id' => $product->id],
                [
                    'supplier_id' => 1,
                    'warehouse_id' => 1,
                    'balance' => 0,
                    'status' => 'Need Restock',
                ]
            );
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

    public function purchasing()
    {
        return $this->hasMany(Purchasing::class, 'product_id');
    }
}
