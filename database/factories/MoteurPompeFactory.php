<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MoteurPompeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          /*  'debitNominal' => $this->faker->swiftBicNumber,
            'hauteurManometrique' => $this->faker->buildingNumber,
            'corpsDePompe' => $this->faker->swiftBicNumber,
            'chemiseArbre' => $this->faker->macAddress,
            'caracteristique_moteur_id' => rand(1,10),*/
        ];
    }
}
