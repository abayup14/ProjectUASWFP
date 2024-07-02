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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->date("tanggal");
            $table->integer("pelanggans_id");
            $table->foreign("pelanggans_id")->references("id")->on("users");
            $table->double("total_sebelum");
            $table->double("total_sesudah_pajak");
            $table->integer("poin_terpakai");
            $table->double("total_bayar");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
