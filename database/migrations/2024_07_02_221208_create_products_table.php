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
            $table->string("nama", 45);
            $table->double("harga");
            $table->string("image", 45);
            $table->integer("tipe_products_id");
            $table->foreign("tipe_products_id")->references("id")->on("tipe_products");
            $table->string("hotels_id");
            $table->foreign("hotels_id")->references("id")->on("hotels");
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
