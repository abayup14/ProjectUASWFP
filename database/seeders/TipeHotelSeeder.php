<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipeHotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table("tipe_hotels")->insert([
            ["nama"=>"city hotel"],
            ["nama"=>"motel"],
            ["nama"=>"residential hotel"],
            ["nama"=>"resort"]
        ]);
    }
}
