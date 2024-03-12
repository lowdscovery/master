<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Information extends Component
{
    public function render()
    {
        return view('livewire.intervenant.information')
        ->extends("layouts.principal")
        ->section("contenu");
    }

}
