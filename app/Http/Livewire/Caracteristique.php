<?php

namespace App\Http\Livewire;

use App\Models\CaracteristiqueMoteur;
use Livewire\Component;
use Livewire\WithPagination;

class Caracteristique extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $newCaract = [];
    public $isBtnAddClicked=false;
    public $search = "";

    public function render()
    {
        $searchCriteria = "%".$this->search."%";
        $data = [
            "caracteristiques" => CaracteristiqueMoteur::where("marque","like",$searchCriteria)->latest()->paginate(5),
        ];
        
        return view('livewire.caracteristique.caracteristique',$data)
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
