<?php

namespace App\Http\Livewire;

use App\Models\CaracteristiqueMoteur;
use App\Models\District;
use App\Models\Forage;
use App\Models\MoteurElectrique;
use App\Models\MoteurPompe;
use App\Models\Ressource;
use App\Models\Site;
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
    public $editModal = [];
    public $selectedDistrict=[];
    public $selectedSite=[];
    public $selectedressource=[];
    public $selectedForage=[];
    public $sites = [];
    public $ressources = [];
    public $forages = [];
    public $card=false;

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
            /*'newCaract.marque' => 'required',
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
            'newCaract.moteurs' => 'required',*/
            'selectedDistrict.district_id' => 'required',
            'selectedSite.site_id' => 'required',
            'selectedressource.ressource_id' => 'required',
            'selectedForage.forage_id' => 'required',
        ];
    }

    public function render()
    {
        //selecte district
        if(!empty($this->selectedDistrict)){
        $this->sites = Site::where('district_id', $this->selectedDistrict)->get();
        }
        if(!empty($this->selectedSite)){
            $this->ressources = Ressource::where('site_id', $this->selectedSite)->get();
            }
        if(!empty($this->selectedressource)){
            $this->forages = Forage::where('ressource_id', $this->selectedressource)->get();
            }

        $searchCriteria = "%".$this->search."%";
        $data = [
        "districts" =>District::all(),
       // "sites" => Site::where('district_id')->get(), 
        "caracteristiques" => CaracteristiqueMoteur::where("marque","like",$searchCriteria)->latest()->paginate(5),
        "pompes" => MoteurPompe::where("caracteristique_moteur_id",optional($this->selectedMoteur)->id)->get(),
        "electriques" => MoteurElectrique::where("caracteristique_moteur_id",optional($this->selectedMoteur)->id)->get(),
           // "pompes" => MoteurPompe::where("moteur_pompe_id",optional($this->selectedMoteur)->id)->get()
        
       /* Table relation
        "caract"=>District::with('caract')->get(),
        "district"=>CaracteristiqueMoteur::with('districts')->get(),*/
        ];
        
        return view('livewire.caracteristique.index',$data)
        ->extends("layouts.principal")
        ->section("contenu");
    }

    //show card
    public function card(){
        $this->card = true;
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
       //  $validationAttributes = $this->validate();
       //  dump($validationAttributes);
       // Ajouter un nouvel utilisateur
       //  CaracteristiqueMoteur::create($validationAttributes["newCaract"]);
     //  CaracteristiqueMoteur::create($validationAttributes["selectedDistrict"]["selectedSite"]["selectedressource"]["selectedForage"]);
     $this->validate([
        'selectedDistrict.district_id' => 'required',
        'selectedSite.site_id' => 'required',
        'selectedressource.ressource_id' => 'required',
        'selectedForage.forage_id' => 'required',
    ]);
    CaracteristiqueMoteur::create([
        "marque"=> " ",
        "district_id"=>$this->selectedDistrict["district_id"],
        "site_id"=>$this->selectedSite["site_id"],
        "ressource_id"=>$this->selectedressource["ressource_id"],
        "forage_id"=>$this->selectedForage["forage_id"],
    ]);
         //reinitialiser le formulaire
         $this->resetErrorBag();
         $this->selectedDistrict ="";
         $this->selectedSite ="";
         $this->selectedressource ="";
         $this->selectedForage ="";
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
    $this->editModal = [];
    $this->resetErrorBag();
}
public function editModalPompe(){
    $validated = $this->validate([
        "editModal.debitNominal" =>"required",
        "editModal.hauteurManometrique" =>"required",
        "editModal.corpsDePompe" =>"required",
        "editModal.chemiseArbre" =>"required"
    ]);
    MoteurPompe::create([
        "debitNominal" => $this->editModal["debitNominal"],
        "hauteurManometrique" => $this->editModal["hauteurManometrique"],
        "corpsDePompe" => $this->editModal["corpsDePompe"],
        "chemiseArbre" => $this->editModal["chemiseArbre"],
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
//edit modal
public function EditModal(MoteurPompe $pompe){
    $this->editModal["debitNominal"] = $pompe->debitNominal ;
    $this->editModal["hauteurManometrique"] = $pompe->hauteurManometrique ;
    $this->editModal["corpsDePompe"] = $pompe->corpsDePompe;
    $this->editModal["chemiseArbre"] = $pompe->chemiseArbre ;
    $this->editModal["id"] = $pompe->id;
}
public function updateModal(){
    $this->validate([
        "editModal.debitNominal" => "required",
        "editModal.hauteurManometrique" => "required",
        "editModal.corpsDePompe" => "required",
        "editModal.chemiseArbre" => "required"
    ]);
    MoteurPompe::find($this->editModal["id"])->update([
        "debitNominal" => $this->editModal["debitNominal"],
        "hauteurManometrique" => $this->editModal["hauteurManometrique"],
        "corpsDePompe" => $this->editModal["corpsDePompe"],
        "chemiseArbre" => $this->editModal["chemiseArbre"]
    ]);

    $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Mise à jour avec succès!"]);
}

public function closeModal(){
    $this->dispatchBrowserEvent("closeModal", []);
}
}
