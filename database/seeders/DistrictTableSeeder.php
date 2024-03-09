<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("districts")->insert([
            ["nom"=>"Mahajanga I"],
            ["nom"=>"Ambato Boeny"],
            ["nom"=>"Mitsinjo"],
            ["nom"=>"MadiroValo"],
        ]);
    }
}
