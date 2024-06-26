<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $appends = ['totalPrice'];
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'payment',
        'note',
        'token',
        'customer_id',
        'status'
    ];

    public function customer() {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function details() {
        return $this->hasMany(OrderDetail::class, 'order_id', 'id');
    }

    public function getTotalPriceAttribute() {
        $t = 0;

        foreach($this->details as $item) {
            $t += $item->price * $item->quantity;
        }

        return $t;
    }
    public function payment()
    {
        return $this->hasOne(Payment::class, 'order_id', 'id');
    }
}
