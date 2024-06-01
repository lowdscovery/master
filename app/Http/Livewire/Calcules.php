<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CalculeColonne;
use Illuminate\Support\Facades\DB;

class Calcules extends Component
{
    public $data;
    public $col1;
    public $col2;
    public $col3;
    public $avg_col;
    public $result_col;
    public $dataId;

    public function render()
    {
        $this->data = CalculeColonne::all();
        return view('livewire.calcules')
        ->extends("layouts.principal")
        ->section("contenu");
    }

    public function create()
    {
        $this->validate([
            'col1' => 'required|numeric',
            'col2' => 'required|numeric',
            'col3' => 'required|numeric',
        ]);

        $avg_col = ($this->col1 + $this->col2 + $this->col3) / 3;
        $result_col = $avg_col * 0.8 * 1.732;

        CalculeColonne::create([
            'col1' => $this->col1,
            'col2' => $this->col2,
            'col3' => $this->col3,
            'avg_col' => $avg_col,
            'result_col' => $result_col,
        ]);

        $this->resetInputs();
    }

    public function edit($id)
    {
        $data = CalculeColonne::findOrFail($id);
        $this->dataId = $id;
        $this->col1 = $data->col1;
        $this->col2 = $data->col2;
        $this->col3 = $data->col3;
    }

    public function update()
    {
        $this->validate([
            'col1' => 'required|numeric',
            'col2' => 'required|numeric',
            'col3' => 'required|numeric',
        ]);

        if ($this->dataId) {
            $data = CalculeColonne::find($this->dataId);
            $avg_col = ($this->col1 + $this->col2 + $this->col3) / 3;
            $result_col = $avg_col * 0.8 * 1.732;

            $data->update([
                'col1' => $this->col1,
                'col2' => $this->col2,
                'col3' => $this->col3,
                'avg_col' => $avg_col,
                'result_col' => $result_col,
            ]);

            $this->resetInputs();
        }
    }

    private function resetInputs()
    {
        $this->col1 = '';
        $this->col2 = '';
        $this->col3 = '';
    }

   
}
