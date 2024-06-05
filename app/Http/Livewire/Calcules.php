<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CalculeColonne;
use Illuminate\Support\Facades\DB;

class Calcules extends Component
{
    public $newItem;

    public function addItemToSecondRow()
    {
        $this->validate([
            'newItem' => 'required|string|max:255',
        ]);

        $items = CalculeColonne::all();

        if ($items->count() < 2) {
            // Si moins de 2 éléments, ajouter à la fin
            CalculeColonne::create(['name' => $this->newItem]);
        } else {
            // Insérer en deuxième position
            $secondItem = $items[1];
            $secondItem->update(['name' => $this->newItem]);
        }

        $this->newItem = '';
    }

    public function render()
    {
        return view('livewire.calcules', [
            'items' => CalculeColonne::all(),
        ])
        ->extends("layouts.principal")
        ->section("contenu");
       // ->extends("layouts.invoice")
       // ->section("contenu");
    }

   
}
