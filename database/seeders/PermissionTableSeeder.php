<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("permissions")->insert([
            ["nom"=>"Ajouoter d'un moteur"],
            ["nom"=>"Modifier d'un moteur"],
            ["nom"=>"Supprimer d'un moteur"],
        ]);
    }
}
