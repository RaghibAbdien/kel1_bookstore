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

    public function warehouseproduct()
    {
        return $this->hasMany(WarehouseProduct::class, 'product_id');
    }
}
