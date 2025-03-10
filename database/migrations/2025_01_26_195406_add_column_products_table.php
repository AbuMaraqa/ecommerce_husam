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
        Schema::table('products', function (Blueprint $table) {
            $table->text('sku')->uniqid();
            $table->float('wholesale_price')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('low_stock')->nullable();
            $table->integer('active')->default(1);
            $table->integer('available')->default(1);
            $table->integer('sold_count')->default(0);
            $table->integer('featured')->default(0);
            $table->integer('delivery_class')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('sku');
            $table->dropColumn('wholesale_price');
            $table->dropColumn('quantity');
            $table->dropColumn('low_stock');
            $table->dropColumn('active');
            $table->dropColumn('available');
            $table->dropColumn('sold_count');
            $table->dropColumn('featured');
            $table->dropColumn('delivery_class');
        });
    }
};
