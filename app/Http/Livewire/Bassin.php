<?php

namespace App\Http\Livewire;

use App\Models\Bassin as ModelsBassin;
use Livewire\Component;
use App\Models\Ressource;

class Bassin extends Component
{

    public $isSelectededit = false;
    public $isSelected = false;
    public $dataId;
    public $Longueur;
    public $Largeur;
    public $Hauteur;
    public $HauteurAspiration;
    public $Total;
    public $ressource_id;
    public $averageResult;
    public $finalResult;


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

    public function render()
    {
        $data = [
            "bassins" => ModelsBassin::latest()->paginate(5),
            "ressources" => Ressource::all(),
          ];
        return view('livewire.bassin.bassin',$data)
        ->extends("layouts.principal")
        ->section("contenu");
    }


    public function Bassin(){
        $average = ($this->Longueur * $this->Largeur * $this->Hauteur);
        $average1 = ($this->Longueur * $this->Largeur * $this->HauteurAspiration);
        $this->averageResult = $average - $average1;
        $this->finalResult = $this->averageResult;
         $this->validate([
             "Longueur" =>"required",
             "Largeur" =>"required",
             "Hauteur" =>"required",
             "HauteurAspiration" =>"required",
             "ressource_id" =>"required",
         ]);
        
         ModelsBassin::create(
             [
                 "Longueur"=> $this->Longueur,
                 "Largeur" => $this->Largeur,
                 "Hauteur" => $this->Hauteur,
                 "HauteurAspiration" => $this->HauteurAspiration,
                 "Volume" => $average,        
                 "VolumeAspiration" => $average1,     
                 "Total" => $this->finalResult,
                 "ressource_id" => $this->ressource_id,         
             ]
          );
         $this->resetErrorBag();
         $this->resetInputs();
         $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Votre demande reussi avec succès!"]);
     }
     

     public function editBassin($id){
        $data = ModelsBassin::findOrFail($id);
        $this->dataId = $id;
        $this->Longueur = $data->Longueur;
        $this->Largeur = $data->Largeur;
        $this->Hauteur = $data->Hauteur;
        $this->HauteurAspiration = $data->HauteurAspiration;
        $this->ressource_id = $data->ressource_id;
        $this->editselect();
    }
     public function updateBassin(){
        $this->validate([
            "Longueur" =>"required",
            "Largeur" =>"required",
            "Hauteur" =>"required",
            "HauteurAspiration" =>"required",
            "ressource_id" =>"required",
        ]);
        if ($this->dataId) {
            $data = ModelsBassin::find($this->dataId);

        $average = ($this->Longueur * $this->Largeur * $this->Hauteur);
        $average1 = ($this->Longueur * $this->Largeur * $this->HauteurAspiration);
        $this->averageResult = $average - $average1;
        $this->finalResult = $this->averageResult;

            $data->update([
                "Longueur"=> $this->Longueur,
                "Largeur" => $this->Largeur,
                "Hauteur" => $this->Hauteur,
                "HauteurAspiration" => $this->HauteurAspiration,
                "Volume" => $average,        
                "VolumeAspiration" => $average1,     
                "Total" => $this->finalResult,
                "ressource_id" => $this->ressource_id,
            ]);
            $this->resetInputs();
        }
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=> "Bassin mis à jour avec succès!"]);
      }

    public function confirmDelete(ModelsBassin $bassin){
        $this->dispatchBrowserEvent("showConfirmMessage", ["message"=> [
            "text" => "Vous êtes sur le point pour supprimer? Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
            "type" => "warning",
            "data" => ["models_bassin_id" => $bassin->id]
        ]]);
    }
    
      public function deleteBassin(ModelsBassin $bassin){
        $bassin->delete();
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Bassin supprimé avec succès!"]);
      }
      private function resetInputs()
      {
          $this->Longueur="";$this->Largeur="";$this->Hauteur="";$this->HauteurAspiration="";
          $this->ressource_id="";
      }
}
