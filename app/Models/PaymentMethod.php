<?php

namespace App\Models;

use App\Models\Payment;
use App\Models\Bookstore;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentMethod extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function payment()
    {
        return $this->hasMany(Payment::class, 'payment_method_id');
    }

    public function bookstore(){
        return $this->hasMany(Bookstore::class, 'payment_method_id');
    }
}
