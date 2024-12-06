<?php

namespace App\Models;

use App\Models\Stock;
use App\Models\Purchasing;
use App\Models\WarehouseProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Warehouse extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function warehouseproduct()
    {
        return $this->hasMany(WarehouseProduct::class, 'warehouse_id');
    }

    public function stock()
    {
        return $this->hasMany(Stock::class, 'warehouse_id');
    }

    public function purchasing()
    {
        return $this->hasMany(Purchasing::class, 'warehouse_id');
    }
}
