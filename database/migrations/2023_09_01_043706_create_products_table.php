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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name')->nullable()->default('')->comment('名稱');
            $table->string('img_path')->nullable()->default('')->comment('圖片路徑');
            $table->integer('price')->nullable()->default(0)->comment('價格');
            $table->integer('status')->nullable()->default('2')->comment('1上架/2不上架');
            $table->text('descr')->nullable()->comment('描述');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
