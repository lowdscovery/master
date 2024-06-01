<?php

namespace App\Http\Livewire;

use App\Models\Depense as ModelsDepense;
use App\Models\Intervenant as ModelsIntervenant;

use Livewire\Component;
use Livewire\WithPagination;

class Depense extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search;
    public $addDepense = [];
    public $editDepense = [];
    public function render()
    {
        $searchCriteria = "%".$this->search."%";
        $data = [
         "depenses" => ModelsDepense::where("date","like",$searchCriteria)->latest()->paginate(2),
         "inters" => ModelsIntervenant::get(),
        ];
        return view('livewire.depense.depense',$data)
        ->extends("layouts.principal")
        ->section("contenu");
    }


    public function updatedSearch(){
        $this->resetPage();
    }

    protected function rules(){
        return[
            "editDepense.Date"=>"required",
            "editDepense.Motif"=>"required",
            "editDepense.Designation"=>"required",
            "editDepense.Unite"=>"required",
            "editDepense.PrixUnitaire"=>"required",
            "editDepense.Quantite"=>"required",
        ];
    }

    public function addDepense(){
        $this->validate([
            "addDepense.Date"=>"required",
            "addDepense.Motif"=>"required",
            "addDepense.Designation"=>"required",
            "addDepense.Unite"=>"required",
            "addDepense.PrixUnitaire"=>"required",
            "addDepense.Quantite"=>"required",
        ]);
        ModelsDepense::create([
            "Date"=>$this->addDepense["Date"],
            "Motif"=>$this->addDepense["Motif"],
            "Designation"=>$this->addDepense["Designation"],
            "Unite"=>$this->addDepense["Unite"],
            "PrixUnitaire"=>$this->addDepense["PrixUnitaire"],
            "Quantite"=>$this->addDepense["Quantite"],
        ]);
        $this->resetErrorBag();
        $this->addDepense = [];
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Depense ajoutée avec succès!"]);
    }

    public function confirmDelete(ModelsDepense $depense){
        $this->dispatchBrowserEvent("showConfirmMessage",[
            "message"=>
            [
                "text" => "Vous êtes sur le point de supprimer ". $depense->Date ." sur la liste des depenses. Voulez-vous continuer?",
                "title" => "Êtes-vous sûr de continuer?",
                "type" => "warning",
                "data" => ["models_depense_id" => $depense->id]
            ]
        ]);
    }
    public function deleteDepense(ModelsDepense $depense){
        $depense->delete();
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Supprimé avec succès!"]);
      }

      public function editDepense(ModelsDepense $depense){
        $this->editDepense = $depense->toArray();
       }
       public function updateDepense(){
           $this->validate();
           $depense = ModelsDepense::find($this->editDepense["id"]);
           $depense->fill($this->editDepense);

           $depense->save();
           $this->dispatchBrowserEvent("showSuccessMessage", ["message"=> "Mis à jour avec succès!"]);
           $this->editDepense =[];
       }
}


