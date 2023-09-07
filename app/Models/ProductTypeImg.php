<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTypeImg extends Model
{
    use HasFactory;
    protected $table = 'product_type_imgs';
    protected $primaryKey = 'id';
    protected $fillable = ['created_at', 'updated_at', 'img_path', 'product_type_id'];
    public function productType()
    {
        // return $this->hasOne(ProductType::class, 'id', 'product_type_id');
        return $this->belongsTo(ProductType::class, 'product_type_id', 'id');
    }
}
