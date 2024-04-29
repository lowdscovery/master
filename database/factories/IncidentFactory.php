<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class IncidentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
               /* 'dateIncident' => $this->faker->date,
                'indexCH' => $this->faker->phoneNumber,
                'heure' => $this->faker->phoneNumber,
                'natureIncident' => $this->faker->lastName(),
                'cause' => $this->faker->lastName(),
                'action' => $this->faker->lastName(),
                'resultat' => $this->faker->lastName(),
                'intervenant' => $this->faker->lastName,
                'marque|numero' => $this->faker->lastName,*/
        ];
    }
}
