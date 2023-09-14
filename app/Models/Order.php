<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = ['created_at', 'updated_at', 'user_id', 'order_number', 'order_date', 'order_name', 'order_address', 'order_phone', 'order_desc', 'order_total', 'pay_way', 'order_status', 'payment_status', 'delivery_status'];
    // 訂單關聯使用者：多對一
    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }
}
