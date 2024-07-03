<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipeProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table("tipe_products")->insert([
            ["nama"=>"apartment"],
            ["nama"=>"deluxe room"],
            ["nama"=>"double room"],
            ["nama"=>"family room"],
            ["nama"=>"single room"],
            ["nama"=>"standard room"],
            ["nama"=>"studio room"],
            ["nama"=>"suite room"],
            ["nama"=>"superior room"]
        ]);
    }
}
