<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table("hotels")->insert([
           [
               "nama"=>"JW Marriott",
               "alamat"=>"Jl. Embong Malang No.85 - 89",
               "nomor_telepon"=>"081220924355",
               "email"=>"jw.marriott@gmail.com",
               "rating"=>4.8,
               "image"=>"1.jpg",
               "tipe_hotels_id"=>1
           ],
            [
                "nama"=>"Oakwood",
                "alamat"=>"Jl. Raya Kertajaya Indah No.79",
                "nomor_telepon"=>"085276443987",
                "email"=>"oakwood.res@gmail.com",
                "rating"=>4.98,
                "image"=>"2.jpg",
                "tipe_hotels_id"=>3
            ],
            [
                "nama"=>"Kokoon Hotel",
                "alamat"=>"Jl. Slompretan No.26",
                "nomor_telepon"=>"081123845567",
                "email"=>"kokoon.hotel@gmail",
                "rating"=>4,
                "image"=>"3.jpg",
                "tipe_hotels_id"=>4
            ],
        ]);
    }
}
