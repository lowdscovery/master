<?php

namespace App\Http\Livewire;

use App\Models\Forage;
use App\Models\Ressource;
use Livewire\Component;
use Livewire\WithPagination;

class AddType extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $nom;
    public $ressource_id;
    public $isSelectededit = false;
    public $isSelected = false;
    public $data;
    public $dataId;

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
            
            "ressources" => Ressource::all(),
            "forages" => Forage::latest()->paginate(5),
          ];
        return view('livewire.type.add-type',$data)
        ->extends("layouts.principal")
        ->section("contenu");
    }
    
    public function AddType(){
        $this->validate([
            "nom" =>"required",
            "ressource_id" =>"required",
        ]);
       
        Forage::create(
            [
                "nom" => $this->nom,
                "ressource_id" => $this->ressource_id,         
            ]
         );
        $this->resetErrorBag();
        $this->resetInputs();
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Votre demande reussi avec succès!"]);
    }
     //
     public function editType($id){
        $data = Forage::findOrFail($id);
        $this->dataId = $id;
        $this->nom = $data->nom;
        $this->ressource_id = $data->ressource_id;
        $this->editselect();
    }
    
    public function updateType(){
        $this->validate([
          "nom" =>"required",
          "ressource_id" =>"required",
        ]);
        if ($this->dataId) {
            $data = Forage::find($this->dataId);
            $data->update([
                'nom' => $this->nom, 
                'ressource_id' => $this->ressource_id, 
               
            ]);
            $this->resetInputs();
        }
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=> "Ressource mis à jour avec succès!"]);
      }

    //
    public function confirmDelete(Forage $forage){
        $this->dispatchBrowserEvent("showConfirmMessage", ["message"=> [
            "text" => "Vous êtes sur le point pour supprimer? Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
            "type" => "warning",
            "data" => ["forage_id" => $forage->id]
        ]]);
    }
    
      public function deleteType(Forage $forage){
        $forage->delete();
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Forage supprimé avec succès!"]);
      }

    private function resetInputs()
    {
        $this->nom="";$this->ressource_id="";
    }
}
