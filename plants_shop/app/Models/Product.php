<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name','image','price','sale_price','content','quantity','category_id', 'status'];
    protected $hidden = ['created_at','updated_at'];
    public function category(){
        return $this->hasOne(Category::class,'id','category_id');
    }
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class,'product_id','id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class, 'product_id','id');
    }
}
