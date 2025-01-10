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
        Schema::table('users', function (Blueprint $table) {
            $table->text('phone');
            $table->text('address');
            $table->integer('status');
            $table->integer('class');
            $table->integer('city');
            $table->double('purchase_value');
            $table->float('points');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone');
            $table->dropColumn('address');
            $table->dropColumn('status');
            $table->dropColumn('class');
            $table->dropColumn('city');
            $table->dropColumn('purchase_value');
            $table->dropColumn('points');
        });
    }
};
