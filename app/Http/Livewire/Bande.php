<?php

namespace App\Http\Livewire;

use App\Models\Bande as ModelsBande;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\MoteurElectrique;
use App\Models\MoteurPompe;

class Bande extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $isSelectededit = false;
    public $isSelected = false;
    public $Date;
    public $U1;
    public $U2;
    public $U3;
    public $averageResult;
    public $I1;
    public $I2;
    public $I3;
    public $finalResult;
    public $Debit;
    public $Pression;
    public $Moteur;
    public $Pompe;
    public $data;
    public $dataId;
    public $graph= false;
    public $CacheTable=false;
    public $cacheInput=false;
    public $valeurId;
    public $search;

    //reiniitialise graphe
    public $startDate;
    public $endDate;

    public function shwoGraph(){
        //$this->graph=true;
    }
    public function cacheGraph(){
        $this->graph=false;
    }

    public function selected(){
        $this->isSelected = true;
        $this->isSelectededit = false;
        $this->cacheInput=false;
        $this->resetErrorBag();
        $this->resetInputs();
        $this->CacheTable=false;
        
    }
    public function cancel(){
        $this->isSelected = false;
        $this->isSelectededit = false;
        $this->resetErrorBag();
        $this->resetInputs();
        $this->CacheTable=false;
        
    }
    public function editselect(){
        $this->isSelected = false;
        $this->isSelectededit = true;
        $this->resetErrorBag();
        $this->CacheTable=false;
    }

    public function cacheEdit(){
        $this->cacheInput=false;
        $this->isSelected = false;
        $this->CacheTable=false;
        $this->startDate = "";
        $this->endDate = "";
    }

    public function ShowInput(){
        $this->cacheInput=true;
        $this->isSelected = false;
        $this->CacheTable=false;
        $this->startDate = "";
        $this->endDate = "";
    }
    
    public function cacheSearch(){
        $this->CacheTable=true;
        $this->isSelected = false;
        $this->isSelectededit = false;
        $this->startDate = "";
        $this->endDate = "";
    }
//graphe
    public function mount()
    {
        $this->startDate = null;
        $this->endDate = null;
        $this->chargerDerniereValeur();
        $this->search = '';
        // Charger les données
        $this->loadData();
    }
//recupere la derniere valeur
    public function chargerDerniereValeur()
    {
        $derniereValeur = ModelsBande::latest()->first();
        if ($derniereValeur) {
            $this->valeurId = $derniereValeur->id;
            $this->U1 = $derniereValeur->U1;
            $this->U2 = $derniereValeur->U2;
            $this->U3 = $derniereValeur->U3;
            $this->Pression = $derniereValeur->Pression;
            $this->I1 = $derniereValeur->I1;
            $this->I2 = $derniereValeur->I2;
            $this->I3 = $derniereValeur->I3;
            $this->Puissance = $derniereValeur->Puissance;
            $this->Debit = $derniereValeur->Debit;
            $this->Date = $derniereValeur->Date;
            
        } else {
        $this->valeurId = null;
        $this->Moteur="";$this->Pompe="";$this->U1="";$this->U2="";$this->U3="";$this->I1="";$this->I2="";$this->I3="";$this->Debit="";$this->Pression="";$this->Date="";
        }
    }

    public function modifierValeur()
    {
        $this->validate([
            "Date" =>"required",
             "U1" =>"required",
             "U2" =>"required",
             "U3" =>"required",
             "I1" =>"required",
             "I2" =>"required",
             "I3" =>"required", 
             "Debit" =>"required",  
             "Pression" =>"required",
        ]);

        if ($this->valeurId) {
            $valeur = ModelsBande::find($this->valeurId);

            $average = ($this->U1 + $this->U2 + $this->U3) / 3;
            $average1 = ($this->I1 + $this->I2 + $this->I3) / 3;
            $this->averageResult = $average * $average1 * 0.8 * 1.732;
            $this->finalResult = $this->averageResult;

            if ($valeur) {
                $valeur->update([
                    'U1' => $this->U1,
                    'U2' => $this->U2,
                    'U3' => $this->U3,
                    "MoyenU" => $average,
                    'Pression' => $this->Pression,
                    'I1' => $this->I1,
                    'I2' => $this->I2,
                    'I3' => $this->I3,
                    "MoyenI" => $average1,     
                    "Puissance" => $this->finalResult,
                    'Debit' => $this->Debit,
                    'Date' => $this->Date,
                ]);
                $this->selected();
               // $this->resetInputs();
                $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Votre demande reussi avec succès!"]);
            }
        }
    }

    public function updated($propertyName)
    {
        if ($propertyName === 'startDate' || $propertyName === 'endDate' && $propertyName === 'search') {
            $this->loadData();
        }
    }

    public function loadData()
    {
        $query = ModelsBande::query();

        if ($this->startDate && $this->endDate) {
            $query->whereBetween('Date', [$this->startDate, $this->endDate]);
        }
        
        // if (!empty($this->search)) {
        //     $query->where('Moteur', 'like',"%".$this->search."%");
        // }

        if (!empty($this->search)) {
            $query->where(function($q) {
                $q->where('Moteur', 'like', '%' . $this->search . '%')
                  ->orWhere('Pompe', 'like', '%' . $this->search . '%');
            });
        }
        
        $this->data = $query->get();
      //  $this->data = $query->get(['column1', 'column2', 'column3', 'column4', 'column5']);

        // if ($this->startDate && $this->endDate) {
        //     $this->data = ModelsBande::whereBetween('Date', [$this->startDate, $this->endDate])->get();
        // } else {
        //     $this->data = ModelsBande::all();
        // }

        $this->emit('dataUpdated', [
            'labels' => $this->data->pluck('Pression')->toArray(),
            'TensionMoyenne' => $this->data->pluck('MoyenU')->toArray(),
            'IntensiteMoyenne' => $this->data->pluck('MoyenI')->toArray(),
            'Debit' => $this->data->pluck('Debit')->toArray(),
        ]);
    }


    public function render()
    {
        $this->loadData();
        $data = [
            "bandes"=>ModelsBande::all(),
            "moteurs" => MoteurElectrique::all(),
            "pompes" => MoteurPompe::all(),
          ];
        return view('livewire.bande.bande',$data)
        ->extends("layouts.principal")
        ->section("contenu");
    }

    public function Bande(){
         $this->validate([
             "Date" => "required",
            "Moteur"=> "required",
            "Pompe"=> "required",
         ]);
        
         ModelsBande::create(
             [
                 "Date" => $this->Date,
                 "Moteur"=> $this->Moteur,
                 "Pompe"=> $this->Pompe,     
             ]
          );
         $this->ShowInput();
         $this->chargerDerniereValeur();
         $this->emit('record');
         $this->resetErrorBag();
         $this->resetInputs();
         $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Votre demande reussi avec succès!"]);
     }

     //
     public function editBande($id){
        $data = ModelsBande::findOrFail($id);
        $this->dataId = $id;
        $this->Date = $data->Date;
        $this->U1 = $data->U1;
        $this->U2 = $data->U2;
        $this->U3 = $data->U3;
        $this->I1 = $data->I1;
        $this->I2 = $data->I2;
        $this->I3 = $data->I3;
        $this->Debit = $data->Debit;
        $this->Pression = $data->Pression;
        $this->editselect();
    }
    
    public function updateBande(){
        $this->validate([
          "Date" =>"required",
          "U1" =>"required",
          "U2" =>"required",
          "U3" =>"required",
          "I1" =>"required",
          "I2" =>"required",
          "I3" =>"required",
          "Debit" =>"required",  
          "Pression" =>"required",
        ]);
        if ($this->dataId) {
            $data = ModelsBande::find($this->dataId);

            $average = ($this->U1 + $this->U2 + $this->U3) / 3;
            $average1 = ($this->I1 + $this->I2 + $this->I3) / 3;
            $this->averageResult = $average * $average1 * 0.8 * 1.732;
            $this->finalResult = $this->averageResult;

            $data->update([
                'Date' => $this->Date,
                'U1' => $this->U1,
                'U2' => $this->U2,
                'U3' => $this->U3,
                "MoyenU" => $average,
                "I1" => $this->I1,
                "I2" => $this->I2,
                "I3" => $this->I3,
                "MoyenI" => $average1,     
                "Puissance" => $this->finalResult,
                "Debit" => $this->Debit,
                "Pression" => $this->Pression, 
               
            ]);
            $this->resetInputs();
        }
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=> "Bande d'essai mis à jour avec succès!"]);
      }
      //
    public function confirmDelete(ModelsBande $bande){
        $this->dispatchBrowserEvent("showConfirmMessage", ["message"=> [
            "text" => "Vous êtes sur le point pour supprimer? Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
            "type" => "warning",
            "data" => ["models_bande_id" => $bande->id]
        ]]);
    }
    
      public function deleteBande(ModelsBande $bande){
        $bande->delete();
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Bande d'essai supprimé avec succès!"]);
      }
    
      private function resetInputs()
    {
        $this->Moteur="";$this->Pompe="";$this->U1="";$this->U2="";$this->U3="";$this->I1="";$this->I2="";$this->I3="";$this->Debit="";
        $this->Pression="";$this->Date="";
    }
}
