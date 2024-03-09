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
    public $editCaract = [];
    public $currentPage = PAGELIST;
    public $search = "";

    public function rules(){
        if($this->currentPage == PAGEEDITFORM){
            return [
                'editCaract.marque' => 'required',
                'editCaract.type' => 'required',
                'editCaract.numeroSerie' => 'required',
                'editCaract.numeroFabrication' => 'required',
                'editCaract.vitesse' => 'required',
                'editCaract.encombrement' => 'required',
                'editCaract.anneeFabrication' => 'required',
                'editCaract.fournisseur' => 'required',
                'editCaract.dateAcquisition' => 'required',
                'editCaract.dateMiseEnService' => 'required',
                'editCaract.roulement' => 'required',
                'editCaract.misesEnServices' => 'required',
                'editCaract.observations' => 'required',
                'editCaract.moteurs' => 'required',
            ];
        }
        return [
            'newCaract.marque' => 'required',
            'newCaract.type' => 'required',
            'newCaract.numeroSerie' => 'required',
            'newCaract.numeroFabrication' => 'required',
            'newCaract.vitesse' => 'required',
            'newCaract.encombrement' => 'required',
            'newCaract.anneeFabrication' => 'required',
            'newCaract.fournisseur' => 'required',
            'newCaract.dateAcquisition' => 'required',
            'newCaract.dateMiseEnService' => 'required',
            'newCaract.roulement' => 'required',
            'newCaract.misesEnServices' => 'required',
            'newCaract.observations' => 'required',
            'newCaract.moteurs' => 'required',
        ];
    }

    public function render()
    {
        $searchCriteria = "%".$this->search."%";
        $data = [
            "caracteristiques" => CaracteristiqueMoteur::where("marque","like",$searchCriteria)->latest()->paginate(5),
        ];
        
        return view('livewire.caracteristique.index',$data)
        ->extends("layouts.principal")
        ->section("contenu");
    }
    public function goToaddCaracteristique(){
        $this->currentPage=PAGEADDFORM;
       // $this->editCaract=[];
    }
    public function goToList(){
        $this->currentPage=PAGELIST;
        $this->editCaract=[];
    }
    public function addCaract(){
         // Vérifier que les informations envoyées par le formulaire sont correctes
         $validationAttributes = $this->validate();
       //  dump($validationAttributes);
       // Ajouter un nouvel utilisateur
         CaracteristiqueMoteur::create($validationAttributes["newCaract"]);
         //reinitialiser le formulaire
         $this->newCaract = [];
         $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Création avec succès!"]);
    }

    //partie de modifier
public function goToEditCaract($id){
    $this->editCaract = CaracteristiqueMoteur::find($id)->toArray();
    $this->currentPage = PAGEEDITFORM;
    
}

public function updateCaract(){
    // Vérifier que les informations envoyées par le formulaire sont correctes
    $validationAttributes = $this->validate();
    CaracteristiqueMoteur::find($this->editCaract["id"])->update($validationAttributes["editCaract"]);
    $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Mis à jour avec succès!"]);
}
}
