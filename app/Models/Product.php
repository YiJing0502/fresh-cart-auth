<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = ['created_at', 'updated_at','name', 'img_path', 'price','status','descr'];
    // 關聯 購物車：一對多
    public function cart() {
        return $this->hasMany(Cart::class, 'product_id', 'id');
    }
}
