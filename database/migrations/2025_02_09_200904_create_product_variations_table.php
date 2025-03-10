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
        Schema::create('product_variations', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('product_id');
            $table->string('variation_name'); // مثل الحجم، اللون، الخ
            $table->string('variation_value'); // مثل M، L، أحمر، الخ
            $table->decimal('price', 10, 2)->nullable(); // سعر الاختلاف، إذا كان مختلفًا
            $table->integer('stock_quantity')->default(0); // الكمية المتاحة
            $table->string('sku')->nullable();

            $table->timestamps();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variations');
    }
};
