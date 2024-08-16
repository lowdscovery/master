<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Data;

class DataChart extends Component
{
    public $startDate;
    public $endDate;
    public $data;

    public function mount()
    {
        // Initialiser les dates à null pour afficher toutes les données par défaut
        $this->startDate = null;
        $this->endDate = null;

        // Charger les données initiales
        $this->loadData();
    }

    public function updated($propertyName)
    {
        if ($propertyName === 'startDate' || $propertyName === 'endDate') {
            $this->loadData();
        }
    }

    public function loadData()
    {
        if ($this->startDate && $this->endDate) {
            $this->data = Data::whereBetween('created_at', [$this->startDate, $this->endDate])->get();
        } else {
            $this->data = Data::all();
        }

        // Émettre un événement pour rafraîchir le graphique avec les nouvelles données
        $this->emit('dataUpdated', [
            'labels' => $this->data->pluck('column1')->toArray(),
            'dataset' => $this->data->pluck('column2')->toArray(),
        ]);
    }

    public function render()
    {
        return view('livewire.data-chart')
        ->extends("layouts.principal")
        ->section("contenu");
    }
}

    
        
    
