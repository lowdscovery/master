<?php

namespace App\Http\Livewire;

use App\Models\Ouvrage as ModelsOuvrage;
use App\Models\Ressource;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class Ouvrage extends Component
{
    use WithFileUploads,WithPagination;
    protected $paginationTheme = "bootstrap";
    public $isSelected = false;
    public $isSelectededit = false;
    public $addOuvrage = [];
    public $editOuvrage = [];
    public $resetValueInput = 0;
    public $image;
    public $fichier;

    public function render()
    {
        $data = [
            "ouvrages" => ModelsOuvrage::latest()->paginate(3),
            "ressources" => Ressource::all(),
          ];
        return view('livewire.ouvrage.ouvrage',$data)
        ->extends("layouts.principal")
        ->section("contenu");
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
        "image" => "image|max:10240",
        "fichier" => "required|mimes:pdf|max:10240",
        "addOuvrage.ressource_id"=>"required|numeric|unique:ouvrages,ressource_id",
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
    $this->isSelected = true;
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
     /* "image" => "image|max:10240",
      "fichier" => "required|mimes:pdf|max:10240",*/
      "addOuvrage.ressource_id"=>"required",
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
    $this->addOuvrage = [];
    $this->resetValueInput++;
    $this->addOuvrage["edit"] = false;
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
}


