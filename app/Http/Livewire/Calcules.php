<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CalculeColonne;

class Calcules extends Component
{
    /*public $values;

    public function mount(){
        $this->values = CalculeColonne::all();
    }*/
    public $chartData;

    public function mount(){
        $this->chartData = CalculeColonne::select('value','old_value','difference')->get()->toArray();
    }
    
    public function render()
    {  
        return view('livewire.calcules')
        ->extends("layouts.principal")
        ->section("contenu");
    }
//deuxieme
  /*  public $value;
    public $editMode=false;
    public $editId;

    public function calculateAndAdd(){
        $previousValue= CalculeColonne::latest()->first();
        $previousValue = $previousValue ? $previousValue->value : 0;
        $difference = $previousValue - $this->value;

        $differenceSum = CalculeColonne::sum('difference') + $difference;
        CalculeColonne::create([
            'value' => $this->value,
            'difference' => $difference,
            'old_value' => $differenceSum,
        ]);
        $this->reset('value');
    }

    public function edit($id){
        $value = CalculeColonne::find($id);
        $this->value = $value->value;
        $this->editMode = true;
        $this->editId = $id;
    }

    public function update(){
        $value = CalculeColonne::find($this->editId);
        $previousValue = CalculeColonne::where('id','<', $this->editId)->orderBy('id','desc')->first();
        $previousValue = $previousValue ? $previousValue->value : 0;
        $difference = $previousValue - $this->value;
        
        $value->update([
            'value' => $this->value,
            'difference'=> $difference,
        ]);

        $values = CalculeColonne::all();
        $cumulativeSum = 0;
        foreach($values as $val){
            $cumulativeSum += $val->difference;
            $val->update(['old_value' => $cumulativeSum]);
        }
        $this->editMode = false;
        $this->reset(['value', 'editId']);
    }*/

//premier
  /*  public $transactions;
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
    }*/







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
 /*   public function render()
    {
        $values = CalculeColonne::all();
        return view('livewire.calcules',['values'=>$values])
        ->extends("layouts.principal")
        ->section("contenu");
    }*/
}
