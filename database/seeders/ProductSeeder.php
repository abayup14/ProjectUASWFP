<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table("products")->insert([
            [
                "nama"=>"bar",
                "harga"=>95000,
                "image"=>"1.jpeg",
                "tipe_products_id"=>1,
                "hotels_id"=>2
            ],
            [
                "nama"=>"cafe",
                "harga"=>45000,
                "image"=>"2.jpeg",
                "tipe_products_id"=>2,
                "hotels_id"=>1
            ],
            [
                "nama"=>"living room",
                "harga"=>200000,
                "image"=>"3.jpeg",
                "tipe_products_id"=>1,
                "hotels_id"=>2
            ],
            [
                "nama"=>"restaurant",
                "harga"=>100000,
                "image"=>"4.jpeg",
                "tipe_products_id"=>8,
                "hotels_id"=>1
            ],
            [
                "nama"=>"spa",
                "harga"=>200000,
                "image"=>"5.jpeg",
                "tipe_products_id"=>9,
                "hotels_id"=>1
            ],
            [
                "nama"=>"swimming pool",
                "harga"=>50000,
                "image"=>"6.jpeg",
                "tipe_products_id"=>4,
                "hotels_id"=>3
            ],
            [
                "nama"=>"view",
                "harga"=>300000,
                "image"=>"7.jpeg",
                "tipe_products_id"=>8,
                "hotels_id"=>3
            ],
            [
                "nama"=>"night view",
                "harga"=>250000,
                "image"=>"8.jpeg",
                "tipe_products_id"=>8,
                "hotels_id"=>3
            ]
        ]);
    }
}
