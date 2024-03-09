<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("sites")->insert([
            ["nom"=>"Ampombonavony","district_id"=>"1"],
            ["nom"=>"Mahavelona","district_id"=>"1"],
            ["nom"=>"Andranotakatra","district_id"=>"1"],
            ["nom"=>"Ambondrona","district_id"=>"1"],
            ["nom"=>"Amboboaka","district_id"=>"1"],
            ["nom"=>"Androva","district_id"=>"1"],
            ["nom"=>"Ambato atsimo","district_id"=>"2"],
            ["nom"=>"Tsararivotra","district_id"=>"3"],
            ["nom"=>"Ambinany Mahery","district_id"=>"4"],
        ]);
        
    }
}
