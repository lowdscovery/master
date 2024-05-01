<?php

namespace App\Http\Livewire;

use App\Models\CaracteristiqueMoteur;
use App\Models\District;
use App\Models\Doseuse;
use App\Models\Forage;
use App\Models\MoteurElectrique;
use App\Models\MoteurPompe;
use App\Models\Ouvrage;
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
    public $addModal = [];
    public $addMoteur = [];
    public $addDoseuse = [];
    public $selectedDistrict=[];
    public $selectedSite=[];
    public $selectedressource=[];
    public $selectedForage=[];
    public $sites = [];
    public $ressources = [];
    public $forages = [];
    public $card=false;
    public $showInputPompe = false;
    public $affiche = false;
    public $selectedId;
    public $cardselect;
    public $inputDoseuse=false;

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
        "caracteristiques" => CaracteristiqueMoteur::where("ressource_id","like",$searchCriteria)->latest()->paginate(5),
        "caracteristiq" => CaracteristiqueMoteur::where("id",optional($this->selectedId)->id)->get(),
        "electriques" => MoteurElectrique::where("caracteristique_moteur_id",optional($this->selectedMoteur)->id)->get(),
        "pompes" => MoteurPompe::where("caracteristique_moteur_id",optional($this->selectedMoteur)->id)->get(),
        "doseuses" => Doseuse::where("caracteristique_moteur_id",optional($this->selectedMoteur)->id)->get(),
        "pomp" => MoteurPompe::all(),
        "electriq" => MoteurElectrique::all(),
        "ouvrages" => Ouvrage::all(),
        "doseus" => Doseuse::all(),
        
       /* Table relation
        "caract"=>District::with('caract')->get(),
        "district"=>CaracteristiqueMoteur::with('districts')->get(),*/
        ];
        
        return view('livewire.caracteristique.index',$data)
        ->extends("layouts.principal")
        ->section("contenu");
    }

    public function affichage(CaracteristiqueMoteur $affichage){
        $this->affiche=AFFICHAGE;
        $this->selectedId = $affichage;
    }

    public function afficheInputDoseuse(){
        $this->inputDoseuse = true;
    }

    public function showInput(){
        $this->showInputPompe=true;
    }
    public function shoInputDoseuse(){
        $this->inputDoseuse=true;
    }

    //show card
    public function card(){
        $this->card = true;
    }
    public function cardfalse(){
        $this->card = false;
    }
    public function cardtrue(){
        $this->cardselect = true;
    }
    public function cardfalsee(){
        $this->cardselect = false;
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
        
     $this->validate([
        'selectedDistrict.district_id' => 'required',
        'selectedSite.site_id' => 'required',
        'selectedressource.ressource_id' => 'required',
        'selectedForage.forage_id' => 'required',
    ]);
    CaracteristiqueMoteur::create([
      //  "marque"=> " ",
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
       //  $this->card = false;
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
    $this->cancel();
    $this->showInputPompe=false;
}
//pompes
public function editModal(MoteurPompe $pompe){
    $this->addModal = $pompe->toArray();
    $this->addModal["edit"] = true;
    $this->showInput();
}

public function editModalPompe(){

    $validated = $this->validate([
        "addModal.marque" =>"required",
        "addModal.type" =>"required",
        "addModal.numeroSerie" =>"required",
        "addModal.numeroFabrication" =>"required",
        "addModal.vitesse" =>"required",
        "addModal.encombrement" =>"required",
        "addModal.anneeFabrication" =>"required",
        "addModal.fournisseur" =>"required",
        "addModal.dateAcquisition" =>"required",
        "addModal.dateMiseEnService" =>"required",
        "addModal.roulement" =>"required",
        "addModal.misesEnServices" =>"required",
        "addModal.observations" =>"required",
        "addModal.debitNominal" =>"required",
        "addModal.hauteurManometrique" =>"required",
        "addModal.corpsDePompe" =>"required",
        "addModal.chemiseArbre" =>"required"

    ]);
    MoteurPompe::updateOrCreate(
        [
        "caracteristique_moteur_id"=> $this->selectedMoteur->id,
        ],
        [
            "marque" => $this->addModal["marque"],
            "type" => $this->addModal["type"],
            "numeroSerie" => $this->addModal["numeroSerie"],
            "numeroFabrication" => $this->addModal["numeroFabrication"],
            "vitesse" => $this->addModal["vitesse"],
            "encombrement" => $this->addModal["encombrement"],
            "anneeFabrication" => $this->addModal["anneeFabrication"],
            "fournisseur" => $this->addModal["fournisseur"],
            "dateAcquisition" => $this->addModal["dateAcquisition"],
            "dateMiseEnService" => $this->addModal["dateMiseEnService"],
            "roulement" => $this->addModal["roulement"],
            "misesEnServices" => $this->addModal["misesEnServices"],
            "observations" => $this->addModal["observations"],
            "debitNominal" => $this->addModal["debitNominal"],
            "hauteurManometrique" => $this->addModal["hauteurManometrique"],
            "corpsDePompe" => $this->addModal["corpsDePompe"],
            "chemiseArbre" => $this->addModal["chemiseArbre"],
            "caracteristique_moteur_id"=> $this->selectedMoteur->id,
        ]
     );

    $this->resetErrorBag();
     $this->addModal = [];
     $this->addModal["edit"] = false;
    $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Votre demande reussi avec succès!"]);
}

//moteur
public function editMoteur(MoteurElectrique $moteur){
    $this->addMoteur = $moteur->toArray();
    $this->addMoteur["edit"] = true;
    $this->showInput();
}

public function editModalMoteur(){

    $validated = $this->validate([
        "addMoteur.marque" =>"required",
        "addMoteur.type" =>"required",
        "addMoteur.numeroSerie" =>"required",
        "addMoteur.numeroFabrication" =>"required",
        "addMoteur.vitesse" =>"required",
        "addMoteur.encombrement" =>"required",
        "addMoteur.anneeFabrication" =>"required",
        "addMoteur.fournisseur" =>"required",
        "addMoteur.dateAcquisition" =>"required",
        "addMoteur.dateMiseEnService" =>"required",
        "addMoteur.roulement" =>"required",
        "addMoteur.misesEnServices" =>"required",
        "addMoteur.observations" =>"required",

        "addMoteur.puissance" =>"required",
        "addMoteur.tension" =>"required",
        "addMoteur.cosphi" =>"required",
        "addMoteur.intensite" =>"required",
        "addMoteur.sectionCable" =>"required",
        "addMoteur.indiceDeProtection" =>"required",
        "addMoteur.classeIsolant" =>"required",
        "addMoteur.typeDeDemarrage" =>"required"
    ]);
    MoteurElectrique::updateOrCreate(
        [
        "caracteristique_moteur_id"=> $this->selectedMoteur->id,
        ],
        [
            "marque" => $this->addMoteur["marque"],
            "type" => $this->addMoteur["type"],
            "numeroSerie" => $this->addMoteur["numeroSerie"],
            "numeroFabrication" => $this->addMoteur["numeroFabrication"],
            "vitesse" => $this->addMoteur["vitesse"],
            "encombrement" => $this->addMoteur["encombrement"],
            "anneeFabrication" => $this->addMoteur["anneeFabrication"],
            "fournisseur" => $this->addMoteur["fournisseur"],
            "dateAcquisition" => $this->addMoteur["dateAcquisition"],
            "dateMiseEnService" => $this->addMoteur["dateMiseEnService"],
            "roulement" => $this->addMoteur["roulement"],
            "misesEnServices" => $this->addMoteur["misesEnServices"],
            "observations" => $this->addMoteur["observations"],

            "puissance" => $this->addMoteur["puissance"],
            "tension" => $this->addMoteur["tension"],
            "cosphi" => $this->addMoteur["cosphi"],
            "intensite" => $this->addMoteur["intensite"],
            "sectionCable" => $this->addMoteur["sectionCable"],
            "indiceDeProtection" => $this->addMoteur["indiceDeProtection"],
            "classeIsolant" => $this->addMoteur["classeIsolant"],
            "typeDeDemarrage" => $this->addMoteur["typeDeDemarrage"],
            "caracteristique_moteur_id"=> $this->selectedMoteur->id,
        ]
     );

    $this->resetErrorBag();
     $this->addMoteur = [];
     $this->addMoteur["edit"] = false;
    $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Votre demande reussi avec succès!"]);
}

//Doseuse
public function editDoseuse(Doseuse $doseuse){
    $this->addDoseuse = $doseuse->toArray();
    $this->addDoseuse["edit"] = true;
    $this->afficheInputDoseuse();
}

public function addDoseuses(){

    $validated = $this->validate([
        "addDoseuse.marque" =>"required",
        "addDoseuse.type" =>"required",
        "addDoseuse.numeroSerie" =>"required",
        "addDoseuse.numeroFabrication" =>"required",
        "addDoseuse.vitesse" =>"required",
        "addDoseuse.encombrement" =>"required",
        "addDoseuse.anneeFabrication" =>"required",
        "addDoseuse.fournisseur" =>"required",
        "addDoseuse.dateAcquisition" =>"required",
        "addDoseuse.dateMiseEnService" =>"required",
        "addDoseuse.roulement" =>"required",
        "addDoseuse.misesEnServices" =>"required",
        "addDoseuse.observations" =>"required",

        "addDoseuse.pressionMaxAspiration" =>"required",
        "addDoseuse.pressionMaxRefoulement" =>"required",
        "addDoseuse.hauteurAspirationMax" =>"required",
        "addDoseuse.cadence" =>"required",
        "addDoseuse.rapportReduction" =>"required",
        "addDoseuse.course" =>"required",
        "addDoseuse.ballonAmortisseur" =>"required",
        "addDoseuse.ballonAmortisseurRefoulement" =>"required",
        "addDoseuse.corpsDoseur" =>"required",
        "addDoseuse.membrane" =>"required",
        "addDoseuse.arbre" =>"required",
        "addDoseuse.calpetAspiration" =>"required",
        "addDoseuse.calpetRefoulement" =>"required",
        "addDoseuse.tarage" =>"required",
        "addDoseuse.debitMax" =>"required",
        
    ]);
    Doseuse::updateOrCreate(
        [
        "caracteristique_moteur_id"=> $this->selectedMoteur->id,
        ],
        [
            "marque" => $this->addDoseuse["marque"],
            "type" => $this->addDoseuse["type"],
            "numeroSerie" => $this->addDoseuse["numeroSerie"],
            "numeroFabrication" => $this->addDoseuse["numeroFabrication"],
            "vitesse" => $this->addDoseuse["vitesse"],
            "encombrement" => $this->addDoseuse["encombrement"],
            "anneeFabrication" => $this->addDoseuse["anneeFabrication"],
            "fournisseur" => $this->addDoseuse["fournisseur"],
            "dateAcquisition" => $this->addDoseuse["dateAcquisition"],
            "dateMiseEnService" => $this->addDoseuse["dateMiseEnService"],
            "roulement" => $this->addDoseuse["roulement"],
            "misesEnServices" => $this->addDoseuse["misesEnServices"],
            "observations" => $this->addDoseuse["observations"],

            "pressionMaxAspiration" => $this->addDoseuse["pressionMaxAspiration"],
            "pressionMaxRefoulement" => $this->addDoseuse["pressionMaxRefoulement"],
            "hauteurAspirationMax" => $this->addDoseuse["hauteurAspirationMax"],
            "cadence" => $this->addDoseuse["cadence"],
            "rapportReduction" => $this->addDoseuse["rapportReduction"],
            "course" => $this->addDoseuse["course"],
            "ballonAmortisseur" => $this->addDoseuse["ballonAmortisseur"],
            "ballonAmortisseurRefoulement" => $this->addDoseuse["ballonAmortisseurRefoulement"],
            "corpsDoseur" => $this->addDoseuse["corpsDoseur"],
            "membrane" => $this->addDoseuse["membrane"],
            "arbre" => $this->addDoseuse["arbre"],
            "calpetAspiration" => $this->addDoseuse["calpetAspiration"],
            "calpetRefoulement" => $this->addDoseuse["calpetRefoulement"],
            "tarage" => $this->addDoseuse["tarage"],
            "debitMax" => $this->addDoseuse["debitMax"],       
            "caracteristique_moteur_id"=> $this->selectedMoteur->id,
        ]
     );

    $this->resetErrorBag();
     $this->addDoseuse = [];
   //  $this->addDoseuse["edit"] = false;
    $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Votre demande reussi avec succès!"]);
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
    $this->cancel();
}
public function deleteModalMoteur(MoteurPompe $pompe){
    $pompe->delete();
    $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Suppression avec succès!"]);
}

//delete modal moteur
public function confirmDeleteMoteur($id){
    $this->dispatchBrowserEvent("showConfirmMessage", ["message"=> [
        "text" => "Vous êtes sur le point de supprimer. Voulez-vous continuer?",
        "title" => "Êtes-vous sûr de continuer?",
        "type" => "warning",
        "data" => [
            "moteur_electrique_id" => $id
        ]
    ]]);
}
public function deleteModalPompe(MoteurElectrique $moteur){
    $moteur->delete();
    $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Suppression avec succès!"]);
}

public function cancel(){
    $this->resetErrorBag();
    $this->addModal = [];
    $this->addModal["edit"] = false;
    $this->addMoteur = [];
    $this->addMoteur["edit"] = false;
    $this->addDoseuse = [];
    $this->addDoseuse["edit"] = false;
    $this->showInputPompe;
    $this->inputDoseuse=false;
}

//delete modal doseuse
public function confirmDeleteDoseuese($id){
    $this->dispatchBrowserEvent("showConfirmMessage", ["message"=> [
        "text" => "Vous êtes sur le point de supprimer. Voulez-vous continuer?",
        "title" => "Êtes-vous sûr de continuer?",
        "type" => "warning",
        "data" => [
            "doseuse_id" => $id
        ]
    ]]);
}
public function deleteModalDoseuse(Doseuse $doseuse){
    $doseuse->delete();
    $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Suppression avec succès!"]);
}

/*public function cancel(){
    $this->resetErrorBag();
    $this->addModal = [];
    $this->addModal["edit"] = false;
    $this->addMoteur = [];
    $this->addMoteur["edit"] = false;
}*/

}
