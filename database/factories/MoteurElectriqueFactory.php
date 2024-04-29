<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MoteurElectriqueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            /*'puissance' => $this->faker->swiftBicNumber,
            'tension' => $this->faker->buildingNumber,
            'cosphi' => $this->faker->address,
            'intensite' => $this->faker->macAddress,
            'sectionCable' => $this->faker->swiftBicNumber,
            'indiceDeProtection' => $this->faker->buildingNumber,
            'classeIsolant' => $this->faker->address,
            'typeDeDemarrage' => $this->faker->macAddress,
            'caracteristique_moteur_id' => rand(1,10),*/
        ];
    }
}
