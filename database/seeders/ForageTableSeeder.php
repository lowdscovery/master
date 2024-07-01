<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ForageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("forages")->insert([
            ["nom"=>"Forage","ressource_id"=>"1"],
            ["nom"=>"Forage","ressource_id"=>"2"],
            ["nom"=>"Forage","ressource_id"=>"3"],
            ["nom"=>"Forage","ressource_id"=>"4"],
            ["nom"=>"Forage","ressource_id"=>"5"],
            ["nom"=>"Forage","ressource_id"=>"6"],
            ["nom"=>"Forage","ressource_id"=>"7"],
            ["nom"=>"Forage","ressource_id"=>"8"],
            ["nom"=>"Forage","ressource_id"=>"9"],
            ["nom"=>"Forage","ressource_id"=>"10"],
            ["nom"=>"Forage","ressource_id"=>"11"],
            ["nom"=>"Forage","ressource_id"=>"12"],
            ["nom"=>"Forage","ressource_id"=>"15"],
            ["nom"=>"Forage","ressource_id"=>"16"],
            ["nom"=>"Group Electrogene","ressource_id"=>"17"],
            ["nom"=>"Bache","ressource_id"=>"18"],
            ["nom"=>"Bache","ressource_id"=>"20"],
            ["nom"=>"Bache","ressource_id"=>"21"],
            ["nom"=>"Bache","ressource_id"=>"22"],
            ["nom"=>"Bache","ressource_id"=>"23"],
            ["nom"=>"Puits","ressource_id"=>"24"],
            ["nom"=>"Puits","ressource_id"=>"25"],
            ["nom"=>"Forage","ressource_id"=>"26"],
            ["nom"=>"Forage","ressource_id"=>"27"],
        ]);
    }
}
