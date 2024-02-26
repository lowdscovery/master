<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->lastName,
            'Prenom' => $this->faker->firstName,
            'sexe' =>array_rand(["F","H"], 1),
            'telephone' => $this->faker->phoneNumber,
            'pieceIdentite' =>array_rand(["CIN", "PASSPORT", "PERMIS DE CONDUIRE"], 1),
            'numeroPieceIdentite' => $this->faker->unique()->bankAccountNumber,
            'email' => $this->faker->unique()->safeEmail(),
            'photo' => $this->faker->imageUrl(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
          //  'remember_token' => Str::random(10),
            
        ];
    }

}
