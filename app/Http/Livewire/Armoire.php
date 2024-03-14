<?php

namespace App\Http\Livewire;

use App\Models\Armoire as ModelsArmoire;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class Armoire extends Component
{
    use WithFileUploads,WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search;
    public $currentPage = PAGELIST;
    public $addArmoire = [];
    public $editArmoire = [];
    public $image;
    public $editImage;
    public $editPhoto;
    public $photo;
    public $resetValueInput = 0;

    public function render()
    {
        $searchCriteria = "%".$this->search."%";
        $data = [
         "armoires" => ModelsArmoire::where("marque","like",$searchCriteria)->latest()->paginate(2),
        ];
        return view('livewire.armoire.liste',$data)
        ->extends("layouts.principal")
        ->section("contenu");
    }
    public function goToAddArmoire(){
        $this->currentPage = PAGECREATEFORM;
    }
    public function goToEditArmoire(){
        $this->currentPage = PAGEEDITFORM;
    }
    public function goToListArmoire(){
        $this->currentPage = PAGELIST;
    }

    public function addArmoire(){
        sleep(2);
       $this->validate([
            'addArmoire.repere' => 'required',
            'addArmoire.designation' => 'required',
            'addArmoire.marque' => 'required',
            'addArmoire.type' => 'required',
            'addArmoire.reglage' => 'required',
            'addArmoire.datePose' => 'required',
            "image" => "image|max:10240",
            "photo" => "image|max:10240",          
       ]);
       $path="";
       if($this->image){
        $path=$this->image->store('armoires', 'public');
        $imagePath = "storage/".$path;
      }
      $path1="";
       if($this->photo){
        $path1=$this->photo->store('armoires', 'public');
        $imagePath1 = "storage/".$path1;
      }
       ModelsArmoire::create([
       "repere" => $this->addArmoire["repere"],
       "designation" => $this->addArmoire["designation"],
       "marque" => $this->addArmoire["marque"],
       "type" => $this->addArmoire["type"],
       "reglage" => $this->addArmoire["reglage"],
       "datePose" => $this->addArmoire["datePose"],
       "photodevant" => $imagePath,
       "photoderriere" => $imagePath1
       ]);
       $this->addArmoire = [];
       $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Armoire créé avec succès!"]);
       $this->resetValueInput++;
       $this->image=null;
       $this->photo=null;
    }

    
public function showupdateArmoire(ModelsArmoire $armoire){
    $this->editArmoire = $armoire->toArray();
    $this->currentPage = PAGEEDITFORM;
}

public function updateArmoire(){
    sleep(2);
    $this->validate([
            'editArmoire.repere' => 'required',
            'editArmoire.designation' => 'required',
            'editArmoire.marque' => 'required',
            'editArmoire.type' => 'required',
            'editArmoire.reglage' => 'required',
            'editArmoire.datePose' => 'required',
           /* "image" => "image|max:10240",
            "photo" => "image|max:10240",*/
   ]);
    $armoire = ModelsArmoire::find($this->editArmoire["id"]);
    $armoire->fill($this->editArmoire);
  
    if($this->editImage){
        $path = $this->editImage->store("armoires", "public");
        $imagePath = "storage/".$path;
        Storage::disk("local")->delete(str_replace("storage/", "public/", $armoire->photodevant));
        $armoire->photodevant = $imagePath;
    }
    if($this->editPhoto){
        $path1 = $this->editPhoto->store("armoires", "public");
        $imagePath1 = "storage/".$path1;
        Storage::disk("local")->delete(str_replace("storage/", "public/", $armoire->photoderriere));
        $armoire->photoderriere = $imagePath1;
    }
    $armoire->save();
    $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Armoire mis à jour avec succès!"]);
    
}

    public function confirmDelete(ModelsArmoire $armoire){
        $this->dispatchBrowserEvent("showConfirmMessage",[
            "message"=>
            [
                "text" => "Vous êtes sur le point de supprimer ". $armoire->marque ." sur la liste des intervenants. Voulez-vous continuer?",
                "title" => "Êtes-vous sûr de continuer?",
                "type" => "warning",
                "data" => ["models_armoire_id" => $armoire->id]
            ]
        ]);
    }
    public function deleteArmoire(ModelsArmoire $armoire){
        $armoire->delete();
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Supprimé avec succès!"]);
      }

}
