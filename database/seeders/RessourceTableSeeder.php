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
            ["nom"=>"S3","type"=>"Forage","site_id"=>"1","caracteristique_moteur_id"=>"1"],
            ["nom"=>"S3bis","type"=>"Forage","site_id"=>"1","caracteristique_moteur_id"=>"1"],
            ["nom"=>"S5","type"=>"Forage","site_id"=>"1","caracteristique_moteur_id"=>"1"],
            ["nom"=>"S2","type"=>"Forage","site_id"=>"2","caracteristique_moteur_id"=>"2"],
            ["nom"=>"S2bis","type"=>"Forage","site_id"=>"2","caracteristique_moteur_id"=>"2"],
            ["nom"=>"F1","type"=>"Forage","site_id"=>"2","caracteristique_moteur_id"=>"2"],
            ["nom"=>"F2'","type"=>"Forage","site_id"=>"2","caracteristique_moteur_id"=>"2"],
            ["nom"=>"F3'","type"=>"Forage","site_id"=>"2","caracteristique_moteur_id"=>"2"],
            ["nom"=>"S4","type"=>"Forage","site_id"=>"3","caracteristique_moteur_id"=>"3"],
            ["nom"=>"S6","type"=>"Forage","site_id"=>"3","caracteristique_moteur_id"=>"3"],
            ["nom"=>"S7","type"=>"Forage","site_id"=>"3","caracteristique_moteur_id"=>"3"],
            ["nom"=>"F4'","type"=>"Forage","site_id"=>"3","caracteristique_moteur_id"=>"3"],
            ["nom"=>"GEPD DN 400","type"=>"Bassin","site_id"=>"3","caracteristique_moteur_id"=>"3"],
            ["nom"=>"GEPD DN 300","type"=>"Bassin","site_id"=>"3","caracteristique_moteur_id"=>"3"],
            ["nom"=>"F2","type"=>"Forage","site_id"=>"4","caracteristique_moteur_id"=>"4"],
            ["nom"=>"F3","type"=>"Forage","site_id"=>"4","caracteristique_moteur_id"=>"4"],
            ["nom"=>"GE","type"=>"Group Electrogene","site_id"=>"4","caracteristique_moteur_id"=>"4"],
            ["nom"=>"GEPS P1","type"=>"Bache","site_id"=>"5","caracteristique_moteur_id"=>"5"],
            ["nom"=>"GEPD DN 250","type"=>"Bassin","site_id"=>"5","caracteristique_moteur_id"=>"5"],
            ["nom"=>"Surpresseur 1","type"=>"Bache","site_id"=>"6","caracteristique_moteur_id"=>"6"],
            ["nom"=>"Surpresseur 2","type"=>"Bache","site_id"=>"6","caracteristique_moteur_id"=>"6"],
            ["nom"=>"Surpresseur 3","type"=>"Bache","site_id"=>"6","caracteristique_moteur_id"=>"6"],
            ["nom"=>"GE","type"=>"Bache","site_id"=>"6","caracteristique_moteur_id"=>"6"],
            ["nom"=>"GEPS1","type"=>"Puits","site_id"=>"7","caracteristique_moteur_id"=>"7"],
            ["nom"=>"GEPS2","type"=>"Puits","site_id"=>"7","caracteristique_moteur_id"=>"7"],
            ["nom"=>"GEPI","type"=>"Forage","site_id"=>"8","caracteristique_moteur_id"=>"8"],
            ["nom"=>"GEPI","type"=>"Puits","site_id"=>"9","caracteristique_moteur_id"=>"9"],
        ]);
    }
}
