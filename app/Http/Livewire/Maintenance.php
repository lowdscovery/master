<?php

namespace App\Http\Livewire;

use App\Models\Maintenance as ModelsMaintenance;
use App\Models\Intervenant as ModelsIntervenant;
use App\Models\CaracteristiqueMoteur;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class Maintenance extends Component
{
    use WithPagination,WithFileUploads;
    protected $paginationTheme = "bootstrap";
    public $search = "";
    public $addMaintenance = [];
    public $editMaintenance = [];
    public $editImage;
    public $button = true;
    public $resetValueInput =0;
    //
    public $input = false;
    public function showInput(){
        $this->input = true;
       }
       public function cacheInput(){
           $this->input = false;
          }
    //calcute date
    public $dates = false;

    public function cacheButton(){
        $this->button = false;
    }
    public function mount(){
        $this->documents = ModelsMaintenance::all();
        $today = Carbon::today();
        $this->dates = ModelsMaintenance::whereDate('dateMaintenance',$today)->exists();
    }
    public function render()
    {
       $searchCriteria = "%".$this->search."%";
       $data = [
        "maintenances" => ModelsMaintenance::where("dateMaintenance","like",$searchCriteria)->latest()->paginate(2),
        "inters" => ModelsIntervenant::get(),
        "caracteristiques" => CaracteristiqueMoteur::get(),
       ];
       $this ->mount();
        return view('livewire.maintenance.maintenance', $data)
        ->extends("layouts.principal")
        ->section("contenu");
    }

    protected function rules(){
        return[
            'editMaintenance.dateMaintenance'=> 'required',
            'editMaintenance.actionEntreprise'=> 'required',
            'editMaintenance.DureeIntervention'=> 'required',
            'editMaintenance.intervenant_id'=> 'required',
            'editMaintenance.caracteristique_moteurs_id'=> 'required',
            'editImage'=> "required|mimes:pdf|max:10240",
        ];
    }

    public function ajoutMaintenance(){
        $this->validate([
            "addMaintenance.dateMaintenance"=>"required",
            "addMaintenance.actionEntreprise"=>"required",
            "addMaintenance.DureeIntervention"=>"required",
            "addMaintenance.intervenant_id"=>"required",
            "addMaintenance.caracteristique_moteurs_id"=>"required",
        ]);
        ModelsMaintenance::create([
            "dateMaintenance"=>$this->addMaintenance["dateMaintenance"],
            "actionEntreprise"=>$this->addMaintenance["actionEntreprise"],
            "DureeIntervention"=>$this->addMaintenance["DureeIntervention"],
            "intervenant_id"=>$this->addMaintenance["intervenant_id"],
            "caracteristique_moteurs_id"=>$this->addMaintenance["caracteristique_moteurs_id"],
        ]);
        $this->resetErrorBag();
        $this->addMaintenance = [];
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Maintenance ajoutée avec succès!"]);
    }

    public function confirmDelete(ModelsMaintenance $maintenance){
        $this->dispatchBrowserEvent("showConfirmMessage",[
            "message"=>
            [
                "text" => "Vous êtes sur le point de supprimer ". $maintenance->intervenant ." sur la liste des intervenants. Voulez-vous continuer?",
                "title" => "Êtes-vous sûr de continuer?",
                "type" => "warning",
                "data" => ["models_maintenance_id" => $maintenance->id]
            ]
        ]);
    }
    public function deleteMaintenance(ModelsMaintenance $maintenance){
        $maintenance->delete();
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Supprimé avec succès!"]);
      }
      //edit
    public function editMaintenance(ModelsMaintenance $maintenance){
     $this->editMaintenance = $maintenance->toArray();
     $this->showInput();
    }
    public function updateMaintenance(){
        $this->validate();
        $maintenance = ModelsMaintenance::find($this->editMaintenance["id"]);
        $maintenance->fill($this->editMaintenance);

        if($this->editImage){
            $path = $this->editImage->store("maintenance", "public");
            $imagePath = "storage/".$path;
            Storage::disk("local")->delete(str_replace("storage/", "public/", $maintenance->Rapport));
            $maintenance->Rapport = $imagePath;
        }
        $maintenance->save();
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=> "Mis à jour avec succès!"]);
        $this->resetValueInput++;
        $this->editMaintenance = [];
    }

    //show pdf
    public $documents;
    public $selectedDocument;

  /*  public function updated(){
     $this->documents = ModelsMaintenance::all();
   }*/
   public function selectDocument($documentId){
     $this->selectedDocument = ModelsMaintenance::find($documentId);
   }
}
