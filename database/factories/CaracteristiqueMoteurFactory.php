<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CaracteristiqueMoteurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            /*'marque' => $this->faker->macAddress,
            'type' => $this->faker->firstName,
            'numeroSerie' => $this->faker->unique()->numerify,
            'numeroFabrication' => $this->faker->unique()->buildingNumber,
            'vitesse' => $this->faker->buildingNumber,
            'encombrement' => $this->faker->phoneNumber,
            'anneeFabrication' => $this->faker->date,
            'fournisseur' => $this->faker->name,
            'dateAcquisition' => $this->faker->date,
            'dateMiseEnService' => $this->faker->date,
            'roulement' => $this->faker->streetName,
            'misesEnServices' => $this->faker->address,
            'observations' => $this->faker->address,
            'moteurs' => $this->faker->firstName,
            'district_id' => rand(1,4),
            'site_id' => rand(1,9),
            'ressource_id' => rand(1,25),
            'forage_id' => rand(1,25),
            'user_id' => rand(1,10),*/
        ];
    }
}
