<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;

    protected $guarded = [id];

    public function warehouseproduct()
    {
        return $this->hasMany(WarehouseProduct::class, 'warehouse_id');
    }
}
