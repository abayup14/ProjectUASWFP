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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string("nama", 128);
            $table->string("alamat", 128);
            $table->string("nomor_telepon", 12);
            $table->string("email", 128);
            $table->double("rating");
            $table->string("image", 45);
            $table->integer("tipe_hotels_id");
            $table->foreign("tipe_hotels_id")->references("id")->on("tipe_hotels");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
