<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Caracteristique extends Component
{
    public function render()
    {
        return view('livewire.caracteristique')
        ->extends("layouts.principal")
        ->section("contenu");
    }
}
