<?php

namespace App\Http\Livewire;

use App\Models\Mesure as ModelsMesure;
use Livewire\Component;

class Mesure extends Component
{
    public $input= false;
 //   public $NS,$ND,$Debit,$Puissance,$H;
    public $addMesure = [];
    public $editMesure = [];
    public $currentPage = PAGELIST;
    public $averageResult;
    public $finalResult;
    public $dataId;
    public $Date,$IndexCH,$H,$U1,$U2,$U3,$I1,$I2,$I3,$Puissance,$Cos;
    public $Ph1_PH2,$Ph1_PH3,$Ph2_PH3,$Ph1_m,$Ph2_m,$Ph3_m,$X1_X2,$Y1_Y2,$Z1_Z2;
     public $Debit,$Vacuo,$Mano,$ND,$NS,$Rab,$Cs,$Conspé,$Agent;   
    
    public function render()
    {   
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
            "Date"=> "string|required",
            "IndexCH"=> "string|required",
            "H"=> "numeric|required",
            "U1"=> "string|required",
            "U2"=> "string|required",
            "U3"=> "string|required",
            "I1"=> "string|required",
            "I2"=> "string|required",
            "I3"=> "string|required",
            "Puissance"=> "numeric|required",
            "Cos"=> "string|required",
            "Ph1_PH2"=> "string|required",
            "Ph1_PH3"=> "string|required",
            "Ph2_PH3"=> "string|required",
            "Ph1_m"=> "string|required",
            "Ph2_m"=> "string|required",
            "Ph3_m"=> "string|required",
            "X1_X2"=> "string|required",
            "Y1_Y2"=> "string|required",
            "Z1_Z2"=> "string|required",
            "Debit"=> "numeric|required",
            "Vacuo"=> "string|required",
            "Mano"=> "string|required",
            "ND"=> "numeric|required",
            "NS"=> "numeric|required",
            "Agent"=> "string|required",
        ];
      }

    public function addMesure(){
        $average = ($this->NS - $this->ND);
        $average1 = $this->Debit / $average;
        $this->averageResult = ($this->Puissance * $this->H) / $this->Debit;
        $this->finalResult = $this->averageResult;
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
            "addMesure.Ph1_PH2"=> "string|required",
            "addMesure.Ph1_PH3"=> "string|required",
            "addMesure.Ph2_PH3"=> "string|required",
            "addMesure.Ph1_m"=> "string|required",
            "addMesure.Ph2_m"=> "string|required",
            "addMesure.Ph3_m"=> "string|required",
            "addMesure.X1_X2"=> "string|required",
            "addMesure.Y1_Y2"=> "string|required",
            "addMesure.Z1_Z2"=> "string|required",
            "Debit"=> "numeric|required",
            "addMesure.Vacuo"=> "string|required",
            "addMesure.Mano"=> "string|required",
            "ND"=> "numeric|required",
            "NS"=> "numeric|required",
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
            "Ph1_PH2" => $this->addMesure["Ph1_PH2"],
            "Ph1_PH3" => $this->addMesure["Ph1_PH3"],
            "Ph2_PH3" => $this->addMesure["Ph2_PH3"],
            "Ph1_m" => $this->addMesure["Ph1_m"],
            "Ph2_m" => $this->addMesure["Ph2_m"],
            "Ph3_m" => $this->addMesure["Ph3_m"],
            "X1_X2" => $this->addMesure["X1_X2"],
            "Y1_Y2" => $this->addMesure["Y1_Y2"],
            "Z1_Z2" => $this->addMesure["Z1_Z2"],
            "Debit" => $this->Debit,
            "Vacuo" => $this->addMesure["Vacuo"],
            "Mano" => $this->addMesure["Mano"],
            "ND" => $this->ND,
            "NS" => $this->NS,
            "Rab" => $average,
            "Cs" => $average1,
            "Conspé" => $this->finalResult,
            "Agent" => $this->addMesure["Agent"],
        ]);
    $this->resetErrorBag();
    $this->addMesure = [];
        $this->H="";
        $this->Puissance="";
        $this->Debit="";$this->ND="";$this->NS="";
        $this->Agent="";
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
    public function editMesures($id){
        $data = ModelsMesure::findOrFail($id);
        $this->dataId = $id;
        $this->Date = $data->Date;
        $this->IndexCH = $data->IndexCH;
        $this->H = $data->H;
        $this->U1 = $data->U1;
        $this->U2 = $data->U2;
        $this->U3 = $data->U3;
        $this->I1 = $data->I1;
        $this->I2 = $data->I2;
        $this->I3 = $data->I3;
        $this->Puissance = $data->Puissance;
        $this->Cos = $data->Cos;
        $this->Ph1_PH2 = $data->Ph1_PH2;
        $this->Ph1_PH3 = $data->Ph1_PH3;
        $this->Ph2_PH3 = $data->Ph2_PH3;
        $this->Ph1_m = $data->Ph1_m;
        $this->Ph2_m = $data->Ph2_m;
        $this->Ph3_m = $data->Ph3_m;
        $this->X1_X2 = $data->X1_X2;
        $this->Y1_Y2 = $data->Y1_Y2;
        $this->Z1_Z2 = $data->Z1_Z2;
        $this->Debit = $data->Debit;
        $this->Vacuo = $data->Vacuo;
        $this->Mano = $data->Mano;
        $this->ND = $data->ND;
        $this->NS = $data->NS;
        $this->Rab = $data->Rab;
        $this->Cs = $data->Cs;
        $this->Conspé = $data->Conspé;
        $this->Agent = $data->Agent;
        $this->EditInput();

       }
   public function updateMesure(ModelsMesure $mesure){
    $this->validate();
      if ($this->dataId) {
          $data = ModelsMesure::find($this->dataId);
        $average = ($this->NS - $this->ND);
        $average1 = $this->Debit / $average;
        $this->averageResult = ($this->Puissance * $this->H) / $this->Debit;
        $this->finalResult = $this->averageResult;

          $data->update([
            "Date" => $this->Date,
            "IndexCH" => $this->IndexCH,
            "H" => $this->H,
            "U1" => $this->U1,
            "U2" => $this->U2,
            "U3" => $this->U3,
            "I1" => $this->I1,
            "I2" => $this->I2,
            "I3" => $this->I3,
            "Puissance" => $this->Puissance,
            "Cos" => $this->Cos,
            "Ph1_PH2" => $this->Ph1_PH2,
            "Ph1_PH3" => $this->Ph1_PH3,
            "Ph2_PH3" => $this->Ph2_PH3,
            "Ph1_m" => $this->Ph1_m,
            "Ph2_m" => $this->Ph2_m,
            "Ph3_m" => $this->Ph3_m,
            "X1_X2" => $this->X1_X2,
            "Y1_Y2" => $this->Y1_Y2,
            "Z1_Z2" => $this->Z1_Z2,
            "Debit" => $this->Debit,
            "Vacuo" => $this->Vacuo,
            "Mano" => $this->Mano,
            "ND" => $this->ND,
            "NS" => $this->NS,
            "Rab" => $average,
            "Cs" => $average1,
            "Conspé" => $this->finalResult,
            "Agent" => $this->Agent, 
             
          ]);
          $this->resetInputs();
    $this->dispatchBrowserEvent("showSuccessMessage", ["message"=> "Mis à jour avec succès!"]);
    }
 }
 private function resetInputs()
 {
    $this->Date="";$this->IndexCH="";$this->H="";$this->U1="";
     $this->U1="";$this->U2="";$this->U3="";$this->I1="";$this->I2="";$this->I3="";
     $this->Puissance="";$this->Cos="";$this->Ph1_PH2="";$this->Ph1_PH3="";$this->Ph2_PH3="";
     $this->Ph1_m="";$this->Ph2_m="";$this->Ph3_m="";$this->X1_X2="";$this->Y1_Y2="";$this->Z1_Z2="";
     $this->Debit="";$this->Vacuo="";$this->Mano="";$this->ND="";$this->NS="";$this->Rab="";$this->Cs="";
     $this->Conspé="";$this->Agent="";
 }
}
