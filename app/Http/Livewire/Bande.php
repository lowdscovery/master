<?php

namespace App\Http\Livewire;

use App\Models\Bande as ModelsBande;
use Livewire\Component;
use Livewire\WithPagination;

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
    public $data;
    public $dataId;
    public $graph= false;

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
        $this->resetErrorBag();
        $this->resetInputs();
        
    }
    public function cancel(){
        $this->isSelected = false;
        $this->isSelectededit = false;
        $this->resetErrorBag();
        $this->resetInputs();
        
    }
    public function editselect(){
        $this->isSelectededit = true;
        $this->isSelected = false;
        $this->resetErrorBag();
    }

//graphe
    public function mount()
    {
        $this->startDate = null;
        $this->endDate = null;

        // Charger les données
        $this->loadData();
    }
    public function updated($propertyName)
    {
        if ($propertyName === 'startDate' || $propertyName === 'endDate') {
            $this->loadData();
        }
    }

    public function loadData()
    {
        if ($this->startDate && $this->endDate) {
            // Filtrer les données si les dates sont définies
            $this->data = ModelsBande::whereBetween('Date', [$this->startDate, $this->endDate])->get();
        } else {
            // Afficher toutes les données si les dates ne sont pas définies
            $this->data = ModelsBande::all();
        }

        $this->emit('dataUpdated', [
            'labels' => $this->data->pluck('Debit')->toArray(),
            'TensionMoyenne' => $this->data->pluck('MoyenU')->toArray(),
            'IntensiteMoyenne' => $this->data->pluck('MoyenI')->toArray(),
            'Puissance' => $this->data->pluck('Puissance')->toArray(),
            'Pression' => $this->data->pluck('Pression')->toArray(),
        ]);
    }


    public function render()
    {
        $this->loadData();
        return view('livewire.bande.bande')
        ->extends("layouts.principal")
        ->section("contenu");
    }

    public function Bande(){
        $average = ($this->U1 + $this->U2 + $this->U3) / 3;
        $average1 = ($this->I1 + $this->I2 + $this->I3) / 3;
        $this->averageResult = $average * $average1 * 0.8 * 1.732;
        $this->finalResult = $this->averageResult;
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
        
         ModelsBande::create(
             [
                "Date" => $this->Date,
                 "U1" => $this->U1,
                 "U2" => $this->U2,
                 "U3" => $this->U3,
                 "MoyenU" => $average,
                 "I1" => $this->I1,
                 "I2" => $this->I2,
                 "I3" => $this->I3,
                 "MoyenI" => $average1,     
                 "Puissance" => $this->finalResult,
                 "Debit" => $this->Debit,
                 "Pression" => $this->Pression,          
             ]
          );
   //       $this->emit('userProfileUpdated');
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
   //         $this->emit('userProfileUpdated');
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
        $this->U1="";$this->U2="";$this->U3="";$this->I1="";$this->I2="";$this->I3="";$this->Debit="";
        $this->Pression="";$this->Date="";
    }
}
