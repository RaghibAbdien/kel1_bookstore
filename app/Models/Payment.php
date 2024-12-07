<?php

namespace App\Models;

use App\Models\User;
use App\Models\PaymentMethod;
use App\Models\PaymentProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function payment_method()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id');
    }

    public function payment_product()
    {
        return $this->belongsTo(PaymentProduct::class, 'payment_id');
    }
}
