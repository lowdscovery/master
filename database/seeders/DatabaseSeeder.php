<?php

namespace Database\Seeders;

use App\Models\CaracteristiqueMoteur;
use App\Models\Incident;
use App\Models\MoteurElectrique;
use App\Models\MoteurPompe;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         User::factory(4)->create();
      /*   CaracteristiqueMoteur::factory(10)->create();
         MoteurPompe::factory(10)->create();
         MoteurElectrique::factory(10)->create();
         Incident::factory(5)->create();*/

         $this->call(RoleTableSeeder::class);
         $this->call(DistrictTableSeeder::class);
         $this->call(SiteTableSeeder::class);
         $this->call(RessourceTableSeeder::class);
         $this->call(ForageTableSeeder::class);
         $this->call(BassinTableSeeder::class);

         User::find(1)->roles()->attach(1);
         User::find(2)->roles()->attach(2);
         User::find(3)->roles()->attach(3);
         User::find(4)->roles()->attach(4);

         
    }
}
