<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RessourceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("ressources")->insert([
            ["nom"=>"S3","site_id"=>"1"],
            ["nom"=>"S3bis","site_id"=>"1"],
            ["nom"=>"S5","site_id"=>"1"],
            ["nom"=>"S2","site_id"=>"2"],
            ["nom"=>"S2bis","site_id"=>"2"],
            ["nom"=>"F1","site_id"=>"2"],
            ["nom"=>"F2'","site_id"=>"2"],
            ["nom"=>"F3'","site_id"=>"2"],
            ["nom"=>"S4","site_id"=>"3"],
            ["nom"=>"S6","site_id"=>"3"],
            ["nom"=>"S7","site_id"=>"3"],
            ["nom"=>"F4'","site_id"=>"3"],
            ["nom"=>"GEPD DN 400","site_id"=>"3"],
            ["nom"=>"GEPD DN 300","site_id"=>"3"],
            ["nom"=>"F2","site_id"=>"4"],
            ["nom"=>"F3","site_id"=>"4"],
            ["nom"=>"GE","site_id"=>"4"],
            ["nom"=>"GEPS P1","site_id"=>"5"],
            ["nom"=>"GEPD DN 250","site_id"=>"5"],
            ["nom"=>"Surpresseur 1","site_id"=>"6"],
            ["nom"=>"Surpresseur 2","site_id"=>"6"],
            ["nom"=>"Surpresseur 3","site_id"=>"6"],
            ["nom"=>"GE","site_id"=>"6"],
            ["nom"=>"GEPS1","site_id"=>"7"],
            ["nom"=>"GEPS2","site_id"=>"7"],
            ["nom"=>"GEPI","site_id"=>"8"],
            ["nom"=>"GEPI","site_id"=>"9"],
        ]);
    }
}
