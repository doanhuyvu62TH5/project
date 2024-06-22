<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['comment','customer_id','product_id','status','type','blog_id'];
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    // Relationship with Product
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    // Relationship with Blog
    public function blog()
    {
        return $this->belongsTo(Blog::class,'blog_id');
    }
}
