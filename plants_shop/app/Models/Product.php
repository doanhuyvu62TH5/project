<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name','image','price','sale_price','content','category_id', 'status'];
    protected $hidden = ['created_at','updated_at'];
    public function category(){
        return $this->hasOne(Category::class,'id','category_id');
    }
}
