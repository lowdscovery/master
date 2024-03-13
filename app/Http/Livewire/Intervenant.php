<?php

namespace App\Http\Livewire;

use App\Models\Intervenant as ModelsIntervenant;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Intervenant extends Component
{
    public $addIntervenant = [];
    public $editIntervenant = [];
    use WithFileUploads;
    public $image;
    public $search = "";
    public $resetValueInput = 0;
    public $info=false;
    public $selectedId;
    
    

    public function render()
    {
      $searchCriteria = "%".$this->search."%";

      $data = [
        "intervenants" => ModelsIntervenant::where("nom", "like", $searchCriteria)->latest()->paginate(5),
        "selectIds" => ModelsIntervenant::where("id",optional($this->selectedId)->id)->get(),
      ];
        return view('livewire.Intervenant.intervenant',$data)
        ->extends("layouts.principal")
        ->section("contenu");
    }
    //showinfo
    public function showInformation(ModelsIntervenant $intervenant){
      $this->info=INFORMATION;
      $this->selectedId = $intervenant;
  }

    public function AjoutIntervenant(){
       // dump($this->addIntervenant);
       sleep(2);
       $this->validate([
         "addIntervenant.nom"=> "string|min:3|required",
         "addIntervenant.prenom"=> "string|min:3|required",
         "addIntervenant.service"=> "string|min:3|required",
         "addIntervenant.matricule"=> "string|max:20|min:3|required",
         "addIntervenant.sexe"=> "required",
         "addIntervenant.telephone"=> "string|size:10|required",
         "addIntervenant.dateEmbauche"=> "required",
         "image" => "image|max:10240"
       ]); 
       $path="";
       if($this->image){
        $path=$this->image->store('upload', 'public');
      }
      ModelsIntervenant::create([
        "nom" => $this->addIntervenant["nom"],
        "prenom" => $this->addIntervenant["prenom"],
        "service" => $this->addIntervenant["service"],
        "matricule" => $this->addIntervenant["matricule"],
        "sexe" => $this->addIntervenant["sexe"],
        "telephone" => $this->addIntervenant["telephone"],
        "dateEmbauche" => $this->addIntervenant["dateEmbauche"],
        "photo" => $path
       ]);
    $this->resetErrorBag();
    $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Intervenant ajoutée avec succès!"]);
    $this->addIntervenant = [];
    $this->resetValueInput++;
    $this->image=null;
    }

    protected function cleanupOldUploads(){

      $storage = Storage::disk("local");

      foreach($storage->allFiles("livewire-tmp") as $pathFileName){

          if(! $storage->exists($pathFileName)) continue;

          $fiveSecondsDelete = now()->subSeconds(5)->timestamp;

          if($fiveSecondsDelete > $storage->lastModified($pathFileName)){
              $storage->delete($pathFileName);
          }
      }
  }

  //suppression
  public function confirmDelete(ModelsIntervenant $intervenant){
    $this->dispatchBrowserEvent("showConfirmMessage", ["message"=> [
        "text" => "Vous êtes sur le point de supprimer ". $intervenant->nom ." sur la liste des intervenants. Voulez-vous continuer?",
        "title" => "Êtes-vous sûr de continuer?",
        "type" => "warning",
        "data" => ["models_intervenant_id" => $intervenant->id]
    ]]);
}

public function deleteIntervenant(ModelsIntervenant $intervenant){
  $intervenant->delete();
  $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"L'intervenant supprimé avec succès!"]);
}
//modifier
public function updateIntervenant(){
  $this->info= UPDATEINTERVENANT;
}
}
