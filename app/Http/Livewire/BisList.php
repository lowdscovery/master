<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BisList extends Component
{
    public function render()
    {
        return view('livewire.bis.bis-list')
        ->extends("layouts.principal")
        ->section("contenu");
    }
}
