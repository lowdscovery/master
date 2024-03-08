<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CalculeColonne;

class Calcules extends Component
{
    public $transactions;
    public $value;

    //edit
    public $editId;

    public function mount(){
        $this->transactions = CalculeColonne::all();
    }
    public function addTransaction(){
        $lastTransaction = CalculeColonne::latest()->first();
        $oldValue = $lastTransaction ? $lastTransaction->value : 0;
        $difference = $this->value - $oldValue;
        CalculeColonne::create([
            'value' => $this->value,
            'old_value' => $oldValue,
            'difference' => $difference,
        ]);
        $this->transactions = CalculeColonne::all();
        $this->value = '';
    }

    public function editTransaction($id){
        $transaction = CalculeColonne::find($id);
        $this->editId = $id;
        $this->value = $transaction->value;
    }
    public function updateTransaction(){
        $transaction = CalculeColonne::find($this->editId);
        $oldValue = $transaction->old_value;
        $difference = $this->value - $oldValue;
        $transaction->update([
            'value' => $this->value,
            'difference' => $difference,
        ]);
        $this->transactions = CalculeColonne::all();
        $this->value = '';
        $this->editId = null;
    }
    /*public $previousValue;
    public $value;
    public $difference;

    public function mount(){
        $lastTransaction = CalculeColonne::latest()->first();
        $this->previousValue = $lastTransaction ? $lastTransaction->value : 1;
        }
    public function submit()
    {
        $this->validate([
            'value'=>'numeric|required',
        ]);

        $this->difference = $this->value - $this->previousValue;
        CalculeColonne::create([
         'value'=>$this->value,
         'difference'=>$this->difference,
        ]);
        $this->previousValue = $this->value;
        $this->reset('value');
    }*/
    public function render()
    {
        return view('livewire.calcules')
        ->extends("layouts.principal")
        ->section("contenu");
    }
}
