<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CalculeColonne;
use Illuminate\Support\Facades\DB;

class Calcules extends Component
{
    public $nom;
    public $description;
    public $valeurId;
    public $editNom;
    public $editDescription;
    public $successMessage = '';

    protected $rules = [
        'nom' => 'required|string|max:255',
        'description' => 'required|string|max:255',
        'editNom' => 'required|string|max:255',
        'editDescription' => 'required|string|max:255',
    ];

    public function mount()
    {
        $this->chargerDerniereValeur();
    }

    public function chargerDerniereValeur()
    {
        $derniereValeur = CalculeColonne::latest()->first();
        if ($derniereValeur) {
            $this->valeurId = $derniereValeur->id;
            $this->editNom = $derniereValeur->nom;
            $this->editDescription = $derniereValeur->description;
        } else {
            $this->valeurId = null;
            $this->editNom = '';
            $this->editDescription = '';
        }
    }

    public function ajouterValeur()
    {
        $this->validate(['nom' => 'required|string|max:255', 'description' => 'required|string|max:255']);

        $valeur = CalculeColonne::create([
            'nom' => $this->nom,
            'description' => $this->description,
        ]);

        $this->nom = '';
        $this->description = '';
        $this->chargerDerniereValeur();
        $this->successMessage = 'Valeur ajoutée avec succès.';
    }

    public function modifierValeur()
    {
        $this->validate([
            'editNom' => 'required|string|max:255',
            'editDescription' => 'required|string|max:255',
        ]);

        if ($this->valeurId) {
            $valeur = CalculeColonne::find($this->valeurId);
            if ($valeur) {
                $valeur->update([
                    'nom' => $this->editNom,
                    'description' => $this->editDescription,
                ]);

                $this->successMessage = 'Valeur modifiée avec succès.';
            }
        }
    }

    public function render()
    {
        return view('livewire.calcules')
        ->extends("layouts.principal")
        ->section("contenu");
    }
}
