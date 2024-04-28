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
    public $image;

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
    }
    public function cancel(){
        $this->isSelected = false;
        $this->resetErrorBag();
        $this->addOuvrage = [];
        $this->addOuvrage["edit"] = false;
    }
    public function editselect(){
        $this->isSelectededit = true;
    }


public function Ouvrage(){

    $this->validate([
        "addOuvrage.annee" =>"required",
        "addOuvrage.debitExploite" =>"required",
        "addOuvrage.profondeur" =>"required",
        "addOuvrage.type" =>"required",
        "addOuvrage.etatActuel" =>"required",
        "addOuvrage.observation" =>"required",
        "addOuvrage.ressource_id"=>"required|numeric|unique:ouvrages,ressource_id",
        "image" => "image|max:10240"
    ]);
    $path="";
    if($this->image){
     $path=$this->image->store('forage', 'public');
     $imagePath = "storage/".$path;
   }
    ModelsOuvrage::create(
        [
            "annee" => $this->addOuvrage["annee"],
            "debitExploite" => $this->addOuvrage["debitExploite"],
            "profondeur" => $this->addOuvrage["profondeur"],
            "type" => $this->addOuvrage["type"],
            "etatActuel" => $this->addOuvrage["etatActuel"],
            "observation" => $this->addOuvrage["observation"],
            "ressource_id"=> $this->addOuvrage["ressource_id"],
            "photo" => $imagePath,            
        ]
     );

    $this->resetErrorBag();
    $this->addOuvrage = [];
    $this->addOuvrage["edit"] = false;
    $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Votre demande reussi avec succès!"]);
}

public function editOuvrage(ModelsOuvrage $ouvrage){
    $this->addOuvrage = $ouvrage->toArray();
    $this->addOuvrage["edit"] = true;
    $this->isSelected = true;
    $this->editselect();
}

public function updateOuvrage(){
    $this->validate([
        "addOuvrage.annee" =>"required",
        "addOuvrage.debitExploite" =>"required",
        "addOuvrage.profondeur" =>"required",
        "addOuvrage.type" =>"required",
        "addOuvrage.etatActuel" =>"required",
        "addOuvrage.observation" =>"required",
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
  
    $ouvrage->save();
    $this->resetErrorBag();
    $this->addOuvrage = [];
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
}
