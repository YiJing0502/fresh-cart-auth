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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('user_id')->nullable()->comment('使用者id');
            $table->string('order_number')->nullable()->comment('訂單編號');
            $table->date('order_date')->nullable()->comment('送貨日期');
            $table->string('order_name')->nullable()->comment('收件人姓名');
            $table->string('order_address')->nullable()->comment('送貨地址');
            $table->string('order_phone')->nullable()->comment('聯絡電話');
            $table->text('order_desc')->nullable()->comment('訂單備註');
            $table->bigInteger('order_total')->nullable()->comment('訂單總金額');
            $table->tinyInteger('pay_way')->nullable()->comment('付款方式/1.臨櫃匯款2.線上匯款');
            $table->tinyInteger('order_status')->nullable()->comment('訂單狀態/1.處理中2.已確認3.已完成4.已取消')->default(1);
            $table->tinyInteger('payment_status')->nullable()->comment('付款狀態/1.末付款2.付款失敗3.超過付款時間4.已付款5.退款中6.已退款')->default(1);
            $table->tinyInteger('delivery_status')->nullable()->comment('送貨狀態/1.備貨中2.發貨中3.已發貨4.已到達5.已取貨6.退貨中7.已退貨')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
