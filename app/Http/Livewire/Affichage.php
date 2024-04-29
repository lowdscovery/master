<?php

namespace App\Http\Livewire;

use App\Models\CaracteristiqueMoteur;
use Livewire\Component;

class Affichage extends Component
{
    

    public function render()
    {
        return view('livewire.affichage.affichage')
        ->extends("layouts.principal")
        ->section("contenu");
    }

   
}
