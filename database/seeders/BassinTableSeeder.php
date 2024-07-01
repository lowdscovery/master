<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BassinTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("bass")->insert([
            ["nom"=>"Bassin","ressource_id"=>"13"],
            ["nom"=>"Bassin","ressource_id"=>"14"],
            ["nom"=>"Bassin","ressource_id"=>"19"],
        ]);
    }
}
