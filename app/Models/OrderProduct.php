<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;
    protected $table = 'order_products';
    protected $primaryKey = 'id';
    protected $fillable = ['created_at', 'updated_at', 'type_name', 'product_name', 'product_img', 'product_desc', 'product_price', 'desire_qty', 'order_id'];
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
