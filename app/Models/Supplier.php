<?php

namespace App\Models;

use App\Models\Purchasing;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supplier extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function purchasing()
    {
        return $this->hasMany(Purchasing::class, 'supplier_id');
    }
}
