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
        Schema::create('product_transaksi', function (Blueprint $table) {
            $table->integer("transaksis_id");
            $table->primary("transaksis_id");
            $table->foreign("transaksis_id")->references("id")->on("transaksis");
            $table->integer("products_id");
            $table->primary("products_id");
            $table->foreign("products_id")->references("id")->on("products");
            $table->integer("quantity");
            $table->double("sub_total");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_transaksi');
    }
};
