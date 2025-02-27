<?php

namespace App\Http\Livewire;

use App\Models\Forage;
use App\Models\Ouvrage as ModelsOuvrage;
use App\Models\Ressource;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use App\Models\MoteurElectrique;
use App\Models\MoteurPompe;
use App\Models\Site;
use App\Models\District;

class Ouvrage extends Component
{
    use WithFileUploads,WithPagination;
    protected $paginationTheme = "bootstrap";
    public $isSelected = false;
    public $isSelectededit = false;
    public $dataId;
    public $addOuvrage = [];
    public $editOuvrage = [];
    public $resetValueInput = 0;
    public $image;
    public $fichier;
    public $detaille=false;
    public $currentPage = PAGELIST;
    
    //moteur
    public $addMoteur=[];
    public $showInputPompe = false;
    public $selectedMoteur;
    //pompe
    public $addModal = [];

    public function showInput(){
      $this->showInputPompe=true;
  }
  public function showModal(ModelsOuvrage $ouvrage){
    $this->selectedMoteur = $ouvrage;
    $this->cancele();
    $this->showInputPompe=false;
}
  public function cancele(){
    $this->resetErrorBag();
     $this->addModal = [];
     $this->addModal["edit"] = false;
     $this->addMoteur = [];
     $this->addMoteur["edit"] = false;
     $this->addDoseuse = [];
     $this->addDoseuse["edit"] = false;
     $this->showInputPompe;
   // $this->inputDoseuse=false;
}


    public function render()
    {
      Carbon::setLocale("fr");
        $data = [
            "ouvrages" => ModelsOuvrage::latest()->paginate(5),
            "forages" => Forage::all(),
            "moteurs" => MoteurElectrique::where("ouvrage_id",optional($this->selectedMoteur)->id)->get(),
            "pompes" => MoteurPompe::where("ouvrage_id",optional($this->selectedMoteur)->id)->get(),
            "mote" => MoteurElectrique::all(),
            "pomp" => MoteurPompe::all(),
            "ressources"=> Ressource::all(),
            "sites"=> Site::all(),
            "districts"=> District::all(),
          ];
        return view('livewire.ouvrage.ouvrage',$data)
        ->extends("layouts.principal")
        ->section("contenu");
    }
    
    public function detaille(){
      $this->currentPage=DETAILLEOUVRAGE;
    }
    public function showDetaille(){
      $this->currentPage=PAGELIST;
    }
    public function unique(ModelsOuvrage $affichage){
      $this->currentPage=OUVRAGE;   
      $this->selectedId = $affichage; 
    }

    public function selected(){
        $this->isSelected = true;
        $this->isSelectededit =false;
    }
  
    public function cancel(){
        $this->isSelected = false;
        $this->resetErrorBag();
        $this->addOuvrage = [];
        $this->addOuvrage["edit"] = false;
        $this->isSelectededit =false;
    }
    public function editselect(){
        $this->isSelectededit = true;
        $this->isSelected = false;
    }

    public function rules(){
    return [
   //   "addOuvrage.ressource_id"=>['required','numeric', Rule::unique("ouvrages", "ressource_id")->ignore($this->addOuvrage["id"])],
  ];
    } 

public function Ouvrage(){
   sleep(2);
    $this->validate([
        "addOuvrage.annee" =>"required",
        "addOuvrage.type" =>"required",
        "addOuvrage.debitNominale" =>"required",
        "addOuvrage.profondeur" =>"required",
        "addOuvrage.debitConseiller" =>"required",
        "addOuvrage.debitExploite" =>"required",
        "addOuvrage.diametre" =>"required",
        "addOuvrage.nombreExhaur" =>"required",  
        "addOuvrage.sondeBas" =>"required",
        "addOuvrage.sondeHaut" =>"required",
      //  "image" => "image|max:10240",
      //  "fichier" => "mimes:pdf|max:10240",
        "addOuvrage.ressource_id"=>"required|unique:ouvrages,ressource_id",
    ]);
    $path="";
    if($this->image){
     $path=$this->image->store('forage', 'public');
     $imagePath = "storage/".$path;
   }
   $filePathPdf="";
   if($this->fichier){
   $filePathPdf=$this->fichier->store('document', 'public');
   $filePath = "storage/".$filePathPdf;
   }
   
    ModelsOuvrage::create(
        [
            "annee" => $this->addOuvrage["annee"],
            "type" => $this->addOuvrage["type"],
            "debitNominale" => $this->addOuvrage["debitNominale"],
            "profondeur" => $this->addOuvrage["profondeur"],
            "debitConseiller" => $this->addOuvrage["debitConseiller"],
            "debitExploite" => $this->addOuvrage["debitExploite"],      
            "diametre" => $this->addOuvrage["diametre"],
            "nombreExhaur" => $this->addOuvrage["nombreExhaur"],
            "sondeBas" => $this->addOuvrage["sondeBas"],
            "sondeHaut" => $this->addOuvrage["sondeHaut"],
            "ressource_id"=> $this->addOuvrage["ressource_id"],
            "photo" => $imagePath,
            "filePdf"=>$filePath,            
        ]
     );
    $this->reset(['fichier']);
    $this->resetErrorBag();
    $this->image =null;
    $this->fichier =null;
    $this->resetValueInput++;
    $this->addOuvrage = [];
    $this->addOuvrage["edit"] = false;
    $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Votre demande reussi avec succès!"]);
}

public function editOuvrage(ModelsOuvrage $ouvrage){
    $this->addOuvrage = $ouvrage->toArray();
  // $this->editOuvrage = $ouvrage->toArray();
    $this->addOuvrage["edit"] = true;
   // $this->isSelected = true;
    $this->editselect();
}

public function updateOuvrage(){
  sleep(2);
    $this->validate([
      "addOuvrage.annee" =>"required",
      "addOuvrage.type" =>"required",
      "addOuvrage.debitNominale" =>"required",
      "addOuvrage.profondeur" =>"required",
      "addOuvrage.debitConseiller" =>"required",
      "addOuvrage.debitExploite" =>"required",
      "addOuvrage.diametre" =>"required",
      "addOuvrage.nombreExhaur" =>"required",  
      "addOuvrage.sondeBas" =>"required",
      "addOuvrage.sondeHaut" =>"required",
    //  "image" => "image|max:10240",
    //  "fichier" => "mimes:pdf|max:10240",
    //  "addOuvrage.ressource_id"=>"required|numeric|unique:ouvrages,ressource_id",
    ]);
    $ouvrage = ModelsOuvrage::find($this->addOuvrage["id"]);
    $ouvrage->fill($this->addOuvrage);

    if($this->image){
        $path = $this->image->store("forage", "public");
        $imagePath = "storage/".$path;
        Storage::disk("local")->delete(str_replace("storage/", "public/", $ouvrage->photo));
        $ouvrage->photo = $imagePath;
    }
    if($this->fichier){
        $filePathPdf = $this->fichier->store("document", "public");
        $filePath = "storage/".$filePathPdf;
        Storage::disk("local")->delete(str_replace("storage/", "public/", $ouvrage->filePdf));
        $ouvrage->filePdf = $filePath;
    }
  
    $ouvrage->save();
    $this->resetErrorBag();
    $this->resetValueInput++;
   // $this->addOuvrage["edit"] = false;
    $this->dispatchBrowserEvent("showSuccessMessage", ["message"=> "Forage mis à jour avec succès!"]);
  }

  public function confirmDelete(ModelsOuvrage $ouvrage){
    $this->dispatchBrowserEvent("showConfirmMessage", ["message"=> [
        "text" => "Vous êtes sur le point de supprimer ". $ouvrage->type ." sur la liste des intervenants. Voulez-vous continuer?",
        "title" => "Êtes-vous sûr de continuer?",
        "type" => "warning",
        "data" => ["models_ouvrage_id" => $ouvrage->id]
    ]]);
}

  public function deleteOuvrage(ModelsOuvrage $ouvrage){
    $ouvrage->delete();
    $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Forage supprimé avec succès!"]);
  }
//show pdf
  public $documents;
  public $selectedDocument;
  public $cachebutton=false;

  public function affichebutton(){
    $this->cachebutton=true;
  }
  public function masquebutton(){
    $this->cachebutton=false;
  }

  public function mount(){
    $this->documents = ModelsOuvrage::all();
  }
  public function selectDocument($documentId){
    $this->affichebutton();
    $this->selectedDocument = ModelsOuvrage::find($documentId);
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
      "addMoteur.typeDeDemarrage" =>"required",
      "addMoteur.longueur" =>"required",
      "addMoteur.largeur" =>"required",
      "addMoteur.hauteur" =>"required",
      "addMoteur.masse" =>"required",
  ]);
  MoteurElectrique::updateOrCreate(
      [
      //"caracteristique_moteur_id"=> $this->selectedMoteur->id,
      "ouvrage_id"=> $this->selectedMoteur->id,
      ],
      [
          "marque" => $this->addMoteur["marque"],
          "type" => $this->addMoteur["type"],
          "numeroSerie" => $this->addMoteur["numeroSerie"],
          "numeroFabrication" => $this->addMoteur["numeroFabrication"],
          "vitesse" => $this->addMoteur["vitesse"],
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
          "longueur" => $this->addMoteur["longueur"],
          "largeur" => $this->addMoteur["largeur"],
          "hauteur" => $this->addMoteur["hauteur"],
          "masse" => $this->addMoteur["masse"],
        //  "caracteristique_moteur_id"=> $this->selectedMoteur->id,
         "ouvrage_id"=> $this->selectedMoteur->id,
      ]
   );

  $this->resetErrorBag();
   $this->addMoteur = [];
   $this->addMoteur["edit"] = false;
  $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Votre demande reussi avec succès!"]);
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
      "addModal.chemiseArbre" =>"required",
      "addModal.longueur" =>"required",
      "addModal.largeur" =>"required",
      "addModal.hauteur" =>"required",
      "addModal.masse" =>"required",

  ]);
  MoteurPompe::updateOrCreate(
      [
      //"caracteristique_moteur_id"=> $this->selectedMoteur->id,
      "ouvrage_id"=> $this->selectedMoteur->id,
      ],
      [
          "marque" => $this->addModal["marque"],
          "type" => $this->addModal["type"],
          "numeroSerie" => $this->addModal["numeroSerie"],
          "numeroFabrication" => $this->addModal["numeroFabrication"],
          "vitesse" => $this->addModal["vitesse"],
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
          "longueur" => $this->addModal["longueur"],
          "largeur" => $this->addModal["largeur"],
          "hauteur" => $this->addModal["hauteur"],
          "masse" => $this->addModal["masse"],
          "ouvrage_id"=> $this->selectedMoteur->id,
      ]
   );

  $this->resetErrorBag();
   $this->addModal = [];
   $this->addModal["edit"] = false;
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
  $this->cancele();
}
public function deleteModalMoteur(MoteurPompe $pompe){
  $pompe->delete();
  $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Suppression avec succès!"]);
}
}


