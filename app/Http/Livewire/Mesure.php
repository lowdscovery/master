<?php

namespace App\Http\Livewire;

use App\Models\Mesure as ModelsMesure;
use Livewire\Component;

class Mesure extends Component
{
    public $input= false;
    public $NS,$ND,$Debit,$Puissance,$H;
    public $addMesure = [];
    public $editMesure = [];
    public $currentPage = PAGELIST;
    public $Rab,$Cs,$Conspé = 0;
    
    public function render()
    {   
        $this->calculate();
        $this->calculate1();
        $this->calculate2();
        $data = [
            "mesures" => ModelsMesure::get(),
            ];
        return view('livewire.mesure.mesure',$data)
        ->extends("layouts.principal")
        ->section("contenu");
    }

    public function showInput(){
       // $this->input = true;
       $this->currentPage = PAGECREATEFORM;
    }
    public function CacheInput(){
       // $this->input = false;
       $this->currentPage = PAGELIST;
    }
    public function EditInput(){
        // $this->input = false;
        $this->currentPage = PAGEEDITFORM;
     }

    //rules
    protected function rules(){
        return[
            "editMesure.Date"=> "string|required",
            "editMesure.IndexCH"=> "string|required",
            "H"=> "numeric|required",
            "editMesure.U1"=> "string|required",
            "editMesure.U2"=> "string|required",
            "editMesure.U3"=> "string|required",
            "editMesure.I1"=> "string|required",
            "editMesure.I2"=> "string|required",
            "editMesure.I3"=> "string|required",
            "Puissance"=> "numeric|required",
            "editMesure.Cos"=> "string|required",
            "editMesure.Ph1/PH2"=> "string|required",
            "editMesure.Ph1/PH3"=> "string|required",
            "editMesure.Ph2/PH3"=> "string|required",
            "editMesure.Ph1/m"=> "string|required",
            "editMesure.Ph2/m"=> "string|required",
            "editMesure.Ph3/m"=> "string|required",
            "editMesure.X1/X2"=> "string|required",
            "editMesure.Y1/Y2"=> "string|required",
            "editMesure.Z1/Z2"=> "string|required",
            "Debit"=> "numeric|required",
            "editMesure.Vacuo"=> "string|required",
            "editMesure.Mano"=> "string|required",
            "ND"=> "numeric|required",
            "NS"=> "numeric|required",
            "Rab"=> "numeric|required",
            "Cs"=> "numeric|required",
            "Conspé"=> "numeric|required",
            "editMesure.Agent"=> "string|required",
        ];
      }

    public function addMesure(){
        $this->validate([         
            "addMesure.Date"=> "string|required",
            "addMesure.IndexCH"=> "string|required",
            "H"=> "numeric|required",
            "addMesure.U1"=> "string|required",
            "addMesure.U2"=> "string|required",
            "addMesure.U3"=> "string|required",
            "addMesure.I1"=> "string|required",
            "addMesure.I2"=> "string|required",
            "addMesure.I3"=> "string|required",
            "Puissance"=> "numeric|required",
            "addMesure.Cos"=> "string|required",
            "addMesure.Ph1/PH2"=> "string|required",
            "addMesure.Ph1/PH3"=> "string|required",
            "addMesure.Ph2/PH3"=> "string|required",
            "addMesure.Ph1/m"=> "string|required",
            "addMesure.Ph2/m"=> "string|required",
            "addMesure.Ph3/m"=> "string|required",
            "addMesure.X1/X2"=> "string|required",
            "addMesure.Y1/Y2"=> "string|required",
            "addMesure.Z1/Z2"=> "string|required",
            "Debit"=> "numeric|required",
            "addMesure.Vacuo"=> "string|required",
            "addMesure.Mano"=> "string|required",
            "ND"=> "numeric|required",
            "NS"=> "numeric|required",
            "Rab"=> "numeric|required",
            "Cs"=> "numeric|required",
            "Conspé"=> "numeric|required",
            "addMesure.Agent"=> "string|required",
        ]);
        ModelsMesure::create([
            "Date" => $this->addMesure["Date"],
            "IndexCH" => $this->addMesure["IndexCH"],
            "H" => $this->H,
            "U1" => $this->addMesure["U1"],
            "U2" => $this->addMesure["U2"],
            "U3" => $this->addMesure["U3"],
            "I1" => $this->addMesure["I1"],
            "I2" => $this->addMesure["I2"],
            "I3" => $this->addMesure["I3"],
            "Puissance" => $this->Puissance,
            "Cos" => $this->addMesure["Cos"],
            "Ph1/PH2" => $this->addMesure["Ph1/PH2"],
            "Ph1/PH3" => $this->addMesure["Ph1/PH3"],
            "Ph2/PH3" => $this->addMesure["Ph2/PH3"],
            "Ph1/m" => $this->addMesure["Ph1/m"],
            "Ph2/m" => $this->addMesure["Ph2/m"],
            "Ph3/m" => $this->addMesure["Ph3/m"],
            "X1/X2" => $this->addMesure["X1/X2"],
            "Y1/Y2" => $this->addMesure["Y1/Y2"],
            "Z1/Z2" => $this->addMesure["Z1/Z2"],
            "Debit" => $this->Debit,
            "Vacuo" => $this->addMesure["Vacuo"],
            "Mano" => $this->addMesure["Mano"],
            "ND" => $this->ND,
            "NS" => $this->NS,
            "Rab" => $this->Rab,
            "Cs" => $this->Cs,
            "Conspé" => $this->Conspé,
            "Agent" => $this->addMesure["Agent"],
        ]);
    $this->resetErrorBag();
    $this->addMesure = [];
  //  session()->flash('message', 'Incident ajoutée avec succès!');
    $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Mesure ajoutée avec succès!"]);
    }

    //suppression
    public function confirmDelete(ModelsMesure $mesure){
        $this->dispatchBrowserEvent("showConfirmMessage", [
            "message"=> 
        [
            "text" => "Vous êtes sur le point de supprimer ". $mesure->Date ." sur la liste des mesures. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
            "type" => "warning",
            "data" => ["models_mesure_id" => $mesure->id]
        ]]);
    }
    public function deleteCommande(ModelsMesure $mesure){
        $mesure->delete();
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Le mesure supprimé avec succès!"]);
      }

          //edit
    public function editMesures(ModelsMesure $mesure){
        $this->editMesure = $mesure->toArray();
        $this->EditInput();

       }
   public function updateMesure(ModelsMesure $mesure){
    $this->validate();
    $mesure = ModelsMesure::find($this->editMesure["id"]);
    $mesure->fill($this->editMesure);
    $mesure->save();
    $this->dispatchBrowserEvent("showSuccessMessage", ["message"=> "Mis à jour avec succès!"]);
    }

    //calcule
    
    public function calculate(){
      $this->Rab = $this->NS - $this->ND;
    }
    public function calculate1(){
        $this->Cs = $this->Debit * $this->Rab;
      }
      public function calculate2(){
        $this->Conspé = $this->Puissance * $this->H + $this->Debit;
      }
}
