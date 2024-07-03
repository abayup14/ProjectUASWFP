<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FasilitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table("fasilitas")->insert([
            [
                "nama"=>"free drinks",
                "deskripsi"=>"segelas minuman gratis untuk setiap pelanggan",
                "products_id"=>1
            ],
            [
                "nama"=>"meeting room",
                "deskripsi"=>"ruang meeting yang bisa dipinjam oleh semua",
                "products_id"=>2
            ],
        ]);
    }
}
