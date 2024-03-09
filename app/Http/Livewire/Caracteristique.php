<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Caracteristique extends Component
{
    public $newCaract = [];
    public $isBtnAddClicked=false;

    public function render()
    {
        return view('livewire.caracteristique.caracteristique')
        ->extends("layouts.principal")
        ->section("contenu");
    }
    public function goToaddCaract(){
        $this->isBtnAddClicked=true;
    }
    public function goToList(){
        $this->isBtnAddClicked=false;
    }
    public function addCaract(){

    }
}
