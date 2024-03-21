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
    public $addBande = [];

    public function selected(){
        $this->isSelected = true;
        $this->isSelectededit =false;
        $this->resetErrorBag();
    }
    public function cancel(){
        $this->isSelected = false;
        $this->resetErrorBag();
    }
    public function editselect(){
        $this->isSelectededit = true;
        $this->resetErrorBag();
    }

    public function render()
    {
        $data = [
            "bandes" => ModelsBande::latest()->paginate(4),
          ];
        return view('livewire.bande.bande', $data)
        ->extends("layouts.principal")
        ->section("contenu");
    }

    public function Bande(){
         $this->validate([
             "addBande.U1" =>"required",
             "addBande.U2" =>"required",
             "addBande.U3" =>"required",
             "addBande.I1" =>"required",
             "addBande.I2" =>"required",
             "addBande.I3" =>"required",
             "addBande.Puissance" =>"required",
             "addBande.Debit" =>"required",  
             "addBande.Pression" =>"required",
         ]);
        
         ModelsBande::create(
             [
                 "U1" => $this->addBande["U1"],
                 "U2" => $this->addBande["U2"],
                 "U3" => $this->addBande["U3"],
                 "I1" => $this->addBande["I1"],
                 "I2" => $this->addBande["I2"],
                 "I3" => $this->addBande["I3"],      
                 "Puissance" => $this->addBande["Puissance"],
                 "Debit" => $this->addBande["Debit"],
                 "Pression" => $this->addBande["Pression"],          
             ]
          );
         $this->resetErrorBag();
         $this->addBande = [];
         $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Votre demande reussi avec succès!"]);
     }

     //
     public function editBande(ModelsBande $bande){
        $this->addBande = $bande->toArray();
        $this->addBande["edit"] = true;
        $this->isSelected = true;
        $this->editselect();
    }
    
    public function updateBande(){
        $this->validate([
          "addBande.U1" =>"required",
          "addBande.U2" =>"required",
          "addBande.U3" =>"required",
          "addBande.I1" =>"required",
          "addBande.I2" =>"required",
          "addBande.I3" =>"required",
          "addBande.Puissance" =>"required",
          "addBande.Debit" =>"required",  
          "addBande.Pression" =>"required",
        ]);
        $bande = ModelsBande::find($this->addBande["id"]);
        $bande->fill($this->addBande);
      
        $bande->save();
        $this->resetErrorBag();
      //  $this->addBande = [];
      //  $this->addBande["edit"] = false;
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
}
