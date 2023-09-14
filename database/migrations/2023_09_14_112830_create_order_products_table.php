<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('type_name')->nullable()->comment('類別名稱');
            $table->string('product_name')->nullable()->comment('訂單商品名稱');
            $table->string('product_img')->nullable()->comment('訂單商品照片');
            $table->text('product_desc')->nullable()->comment('訂單商品描述');
            $table->bigInteger('product_price')->nullable()->comment('產品價格');
            $table->bigInteger('desire_qty')->nullable()->comment('預定數量');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_products');
    }
};
