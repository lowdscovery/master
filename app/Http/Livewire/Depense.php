<?php

namespace App\Http\Livewire;

use App\Models\Depense as ModelsDepense;
use App\Models\Intervenant as ModelsIntervenant;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Depense extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search;
    public $addDepense = [];
    public $editDepense = [];
    public $Date,$Motif,$Designation,$Unite,$PrixUnitaire,$Quantite;
    public $dataId;
    public $totalSum;
    public $today;
    public $datedebut;
    public $datefin;
    public $perPage = 5;

    public $impression = false;
    public $imprimer = false;
    public function showImpression(){
        $this->impression = true;
        $this->imprimer = false;
    }
    public function cacheImpression(){
        $this->impression = false;
    }
    //
    public function showImprimer(){
        $this->imprimer = true;
    }
    public function cacheImprimer(){
        $this->imprimer = false;
    }

    public function mount(){
        $this->today = Carbon::now()->toDateString();
    }
    public function render()
    {
        $query = ModelsDepense::query();
        if($this->datedebut && $this->datefin)
        {
            $query->whereBetween('date',[$this->datedebut,$this->datefin]);
        }
        $depenses = $query->latest()->paginate($this->perPage);
        $this->resetPage();
     /*   $searchCriteria = "%".$this->search."%";
        $depenses = ModelsDepense::where("date","like",$searchCriteria)->latest()->paginate(5);*/
      //  $searchCriteria = "%".$this->search."%";
      //  $depenses = ModelsDepense::whereBetween("date",[$this->datedebut,$this->datefin])->latest()->paginate(5);
       $this->totalSum = $depenses->sum('Total');
        
        return view('livewire.depense.depense',[
            'depenses' => $depenses,
            'totalSum' =>  $this->totalSum,
        ])
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
        $average = ($this->addDepense["PrixUnitaire"] * $this->addDepense["Quantite"]);
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
            "Total"=>$average,
        ]);
        $this->resetErrorBag();
        $this->addDepense = [];
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Depense ajoutée avec succès!"]);
    }

    public function confirmDelete(ModelsDepense $depense){
        $this->dispatchBrowserEvent("showConfirmMessage",[
            "message"=>
            [
                "text" => "Vous êtes sur le point de supprimer ". $depense->Motif ." sur la liste des depenses. Voulez-vous continuer?",
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

      public function editDepense($id){
        $data = ModelsDepense::findOrFail($id);
        $this->dataId = $id;
        $this->Date = $data->Date;
        $this->Motif = $data->Motif;
        $this->Designation = $data->Designation;
        $this->Unite = $data->Unite;
        $this->PrixUnitaire = $data->PrixUnitaire;
        $this->Quantite = $data->Quantite;
       }
       public function updateDepense(){
        if ($this->dataId) {
            $data = ModelsDepense::find($this->dataId);
            $average = ($this->PrixUnitaire * $this->Quantite);
           
            $data->update([
                'Date' => $this->Date,
                'Motif' => $this->Motif,
                'Designation' => $this->Designation,
                'Unite' => $this->Unite,
                "PrixUnitaire" => $this->PrixUnitaire,
                "Quantite" => $this->Quantite,
                "Total" => $average,      
               
            ]);
            $this->resetInputs();
        }
           $this->dispatchBrowserEvent("showSuccessMessage", ["message"=> "Mis à jour avec succès!"]);
           $this->editDepense =[];
       }
       private function resetInputs()
       {
           $this->Date="";$this->Motif="";$this->Designation="";$this->Unite="";$this->PrixUnitaire="";
           $this->Quantite="";
       }
}


