<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';
    protected $primaryKey = 'id';
    protected $fillable = ['created_at', 'updated_at', 'user_id','type_id', 'product_id', 'desire_qty'];
    // 關聯 product_id 多對一
    public function product() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    // 關聯 user_id 多對一
    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    // 關聯 user_id 多對一
    public function order()
    {
        return $this->belongsTo(Order::class, 'user_id', 'id');
    }

}
