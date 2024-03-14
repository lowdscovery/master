<?php

namespace App\Http\Livewire;

use App\Models\Maintenance as ModelsMaintenance;
use App\Models\Intervenant as ModelsIntervenant;
use App\Models\CaracteristiqueMoteur;
use Livewire\Component;
use Livewire\WithPagination;

class Maintenance extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search = "";
    public $addMaintenance = [];
    public $editMaintenance = [];

    public function render()
    {
       $searchCriteria = "%".$this->search."%";
       $data = [
        "maintenances" => ModelsMaintenance::where("intervenant","like",$searchCriteria)->latest()->paginate(2),
        "inters" => ModelsIntervenant::get(),
        "caracteristiques" => CaracteristiqueMoteur::get(),
       ];
        return view('livewire.maintenance.maintenance', $data)
        ->extends("layouts.principal")
        ->section("contenu");
    }

    protected function rules(){
        return[
            'editMaintenance.dateMaintenance'=> 'required',
            'editMaintenance.actionEntreprise'=> 'required',
            'editMaintenance.intervenant'=> 'required',
            'editMaintenance.caracteristique'=> 'required',
        ];
    }

    public function addMaintenance(){
        $this->validate([
            "addMaintenance.dateMaintenance"=>"required",
            "addMaintenance.actionEntreprise"=>"required",
            "addMaintenance.intervenant"=>"required",
            "addMaintenance.caracteristique"=>"required",
        ]);
        ModelsMaintenance::create([
            "dateMaintenance"=>$this->addMaintenance["dateMaintenance"],
            "actionEntreprise"=>$this->addMaintenance["actionEntreprise"],
            "intervenant"=>$this->addMaintenance["intervenant"],
            "caracteristique"=>$this->addMaintenance["caracteristique"],
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
    }
    public function updateMaintenance(){
        $this->validate();
        $maintenance = ModelsMaintenance::find($this->editMaintenance["id"]);
        $maintenance->fill($this->editMaintenance);
        $maintenance->save();
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=> "Mis à jour avec succès!"]);
    }
}
