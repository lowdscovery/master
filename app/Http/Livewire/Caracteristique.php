<?php

namespace App\Http\Livewire;

use App\Models\CaracteristiqueMoteur;
use App\Models\MoteurPompe;
use Livewire\Component;
use Livewire\WithPagination;

class Caracteristique extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $newCaract = [];
    public $editCaract = [];
    public $currentPage = PAGELISTFORM;
    public $search = "";
    public $selectedMoteur;
    public $addModal = [];

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
        "pompes" => MoteurPompe::where("caracteristique_moteur_id",optional($this->selectedMoteur)->id)->get()
           // "pompes" => MoteurPompe::where("moteur_pompe_id",optional($this->selectedMoteur)->id)->get()
        ];
        
        return view('livewire.caracteristique.index',$data)
        ->extends("layouts.principal")
        ->section("contenu");
    }
    public function goToaddCaracteristique(){
        sleep(2);
        $this->currentPage=PAGEADDFORM;
        $this->editCaract=[];
        $this->resetErrorBag();
    }
    public function goToList(){
        $this->currentPage=PAGELISTFORM;
        $this->resetErrorBag();
       // $this->editCaract=[];
    }
    public function addCaract(){
        sleep(2);
         // Vérifier que les informations envoyées par le formulaire sont correctes
         $validationAttributes = $this->validate();
       //  dump($validationAttributes);
       // Ajouter un nouvel utilisateur
         CaracteristiqueMoteur::create($validationAttributes["newCaract"]);
         //reinitialiser le formulaire
         $this->resetErrorBag();
         //$this->newCaract = [];
         $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Création avec succès!"]);
    }

    //partie de modifier
public function goToEditCaract($id){
    $this->editCaract = CaracteristiqueMoteur::find($id)->toArray();
    $this->currentPage = PAGEEDITFORM;
    
}

public function updateCaract(){
    sleep(2);
    // Vérifier que les informations envoyées par le formulaire sont correctes
    $validationAttributes = $this->validate();
    CaracteristiqueMoteur::find($this->editCaract["id"])->update($validationAttributes["editCaract"]);
    $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Mis à jour avec succès!"]);
}

//supression
public function confirmDelete($marque, $id){
    $this->dispatchBrowserEvent("showConfirmMessage", ["message"=> [
        "text" => "Vous êtes sur le point de supprimer la marque $marque sur la liste des moteurs. Voulez-vous continuer?",
        "title" => "Êtes-vous sûr de continuer?",
        "type" => "warning",
        "data" => ["caracteristique_moteur_id" => $id]
    ]]);
}
public function deleteCaract($id){
    CaracteristiqueMoteur::destroy($id);
    $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Le moteur supprimé avec succès!"]);
}

//afficher modal
public function showModal(CaracteristiqueMoteur $caracteristique){
    $this->selectedMoteur = $caracteristique;
    $this->addModal = [];
    $this->resetErrorBag();
}
public function addModalPompe(){
    $validated = $this->validate([
        "addModal.debitNominal" =>"required",
        "addModal.hauteurManometrique" =>"required",
        "addModal.corpsDePompe" =>"required",
        "addModal.chemiseArbre" =>"required"
    ]);
    MoteurPompe::create([
        "debitNominal" => $this->addModal["debitNominal"],
        "hauteurManometrique" => $this->addModal["hauteurManometrique"],
        "corpsDePompe" => $this->addModal["corpsDePompe"],
        "chemiseArbre" => $this->addModal["chemiseArbre"],
        "caracteristique_moteur_id"=> $this->selectedMoteur->id,
    ]);

    $this->resetErrorBag();
    $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Moteur pompe ajoutée avec succès!"]);
}

//delete modal pompe
public function confirmDeleteModal($id){
    $this->dispatchBrowserEvent("showConfirmMessage", ["message"=> [
        "text" => "Vous êtes sur le point de supprimer. Voulez-vous continuer?",
        "title" => "Êtes-vous sûr de continuer?",
        "type" => "warning",
        "data" => [
            "moteur_pompe_id" => $id
        ]
    ]]);
}
public function deleteModalPompe(MoteurPompe $pompe){
    $pompe->delete();
    $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Suppression avec succès!"]);
}

public function closeModal(){
    $this->dispatchBrowserEvent("closeModal", []);
}
}
