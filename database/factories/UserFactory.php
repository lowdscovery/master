<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
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
            'nom' =>"RAHERINIAINA",
            'prenom' =>"Georges Aimé Stephan",
            'sexe' =>"Homme",
            'telephone1' =>"0326912132",
            'pieceIdentite' =>"CIN",
            'numeroPieceIdentite' =>"411011014779",
            'email' =>"stephangeorges980@gmail.com",
            'password' =>Hash::make("st0897++"),
            'photo' =>"",         
            
        ];
    }

}
