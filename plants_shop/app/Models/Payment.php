<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id', 'method_payment', 'status_payment', 'account_number', 'account_name', 'transaction_content'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'id','order_id');
    }
}
