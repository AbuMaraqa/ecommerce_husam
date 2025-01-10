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
            $table->text('address')->nullable()->change();
            $table->integer('class')->nullable()->change();
            $table->integer('city')->nullable()->change();
            $table->double('purchase_value')->nullable()->change();
            $table->double('points')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->text('address')->change();
            $table->integer('class')->change();
            $table->integer('city')->change();
            $table->double('purchase_value')->change();
            $table->double('points')->change();
        });
    }
};
