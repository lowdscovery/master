<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CalculeColonne;
use Illuminate\Support\Facades\DB;

class Calcules extends Component
{
    public $values;
    public $currentValue;
    public $selectedId;

    public function mount()
    {
        $this->values = CalculeColonne::all();
    }


    public function render()
    {
        return view('livewire.calcules')
        ->extends("layouts.principal")
        ->section("contenu");
    }

    

    public function saveOrUpdateValue()
    {
        if ($this->selectedId) {
            $value = CalculeColonne::find($this->selectedId);
            $previousValue = $value->current_value;
            $value->update([
                'current_value' => $this->currentValue,
                'difference' => $this->currentValue - $previousValue,
            ]);
        } else {
            $lastValue = CalculeColonne::latest()->first();
            $previousValue = $lastValue ? $lastValue->current_value : 0;
            CalculeColonne::create([
                'current_value' => $this->currentValue,
                'difference' => $this->currentValue - $previousValue,
            ]);
        }

        $this->resetInputFields();
        $this->mount(); // Reload values after saving or updating
    }

    public function editValue($id)
    {
        $value = CalculeColonne::find($id);
        $this->currentValue = $value->current_value;
        $this->selectedId = $id;
    }

    public function resetInputFields()
    {
        $this->currentValue = '';
        $this->selectedId = null;
    }
}
