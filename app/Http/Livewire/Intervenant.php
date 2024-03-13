<?php

namespace App\Http\Livewire;

use App\Models\Intervenant as ModelsIntervenant;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Livewire\WithPagination;

class Intervenant extends Component
{
    public $addIntervenant = [];
    public $editIntervenant = [];
    use WithFileUploads,WithPagination;
    protected $paginationTheme = "bootstrap";
    public $image;
    public $editImage;
    public $search = "";
    public $resetValueInput = 0;
    public $info=false;
    public $selectedId;
    public $changed;
    public $oldvalue = [];
    
    protected function rules(){
      return[
        'editIntervenant.nom'=> 'required',
        'editIntervenant.prenom'=> 'required',
        'editIntervenant.service'=> 'required',
        'editIntervenant.matricule'=> 'required',
        'editIntervenant.sexe'=> 'required',
        'editIntervenant.telephone'=> 'required',
        'editIntervenant.dateEmbauche'=> 'required',
      ];
    }

    public function render()
    {
      $searchCriteria = "%".$this->search."%";

      $data = [
        "intervenants" => ModelsIntervenant::where("nom", "like", $searchCriteria)->latest()->paginate(1),
        "selectIds" => ModelsIntervenant::where("id",optional($this->selectedId)->id)->get(),
      ];

      if($this->editIntervenant != []){
        $this->showButton();
    }

        return view('livewire.Intervenant.intervenant',$data)
        ->extends("layouts.principal")
        ->section("contenu");
    }
    //showinfo
    public function showInformation(ModelsIntervenant $intervenant){
      $this->info=INFORMATION;
      $this->selectedId = $intervenant;
  }
  //showButton
  public function showButton(){
    $this->changed = false;
    if(
      $this->editIntervenant["nom"] != $this->oldvalue["nom"] ||
      $this->editIntervenant["prenom"] != $this->oldvalue["prenom"] ||
      $this->editIntervenant["service"] != $this->oldvalue["service"] ||
      $this->editIntervenant["matricule"] != $this->oldvalue["matricule"] ||
      $this->editIntervenant["sexe"] != $this->oldvalue["sexe"] ||
      $this->editIntervenant["telephone"] != $this->oldvalue["telephone"] ||
      $this->editIntervenant["dateEmbauche"] != $this->oldvalue["dateEmbauche"] ||
      $this->editImage
  ){
      $this->changed = true;
  }
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
        $imagePath = "storage/".$path;
      }
      ModelsIntervenant::create([
        "nom" => $this->addIntervenant["nom"],
        "prenom" => $this->addIntervenant["prenom"],
        "service" => $this->addIntervenant["service"],
        "matricule" => $this->addIntervenant["matricule"],
        "sexe" => $this->addIntervenant["sexe"],
        "telephone" => $this->addIntervenant["telephone"],
        "dateEmbauche" => $this->addIntervenant["dateEmbauche"],
        "photo" => $imagePath
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
public function editIntervenant(ModelsIntervenant $intervenant){
  $this->editIntervenant = $intervenant->toArray();

  $this->selectedId = $intervenant;
  $this->info= UPDATEINTERVENANT;
  $this->oldvalue = $this->editIntervenant;

}

public function updateintervenants(){
  $this->validate();
  $intervenant = ModelsIntervenant::find($this->editIntervenant["id"]);
  $intervenant->fill($this->editIntervenant);

  if($this->editImage){
      $path = $this->editImage->store("upload", "public");
      $imagePath = "storage/".$path;
      Storage::disk("local")->delete(str_replace("storage/", "public/", $intervenant->photo));
      $intervenant->photo = $imagePath;
  }
  $intervenant->save();
  $this->dispatchBrowserEvent("showSuccessMessage", ["message"=> "Intervenant mis à jour avec succès!"]);
}
}
