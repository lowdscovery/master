<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\District;
use App\Models\Site;
use Livewire\WithPagination;

class AddDistricts extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $nom;
    public $isSelectededit = false;
    public $isSelected = false;
    public $data;
    public $dataId;
    public $search = "";

    public function updatedPerPage(){
        $this->resetPage();
    }
    public function updatedSearch(){
        $this->resetPage();
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
    public function render()
    {
        $searchCriteria = "%".$this->search."%";
        $data = [
            "districts" => District::where("nom", "like", $searchCriteria)->latest()->paginate(5),
          ];
        return view('livewire.addDistricts.add-districts',$data)
        ->extends("layouts.principal")
        ->section("contenu");
    }

    public function AddDistrict(){
         $this->validate([
             "nom" =>"required",
         ]);
        
        District::create(
             [
                 "nom" => $this->nom,         
             ]
          );
         $this->resetErrorBag();
         $this->resetInputs();
         $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Votre demande reussi avec succès!"]);
     }
     //
     //
     public function editDistrict($id){
        $data = District::findOrFail($id);
        $this->dataId = $id;
        $this->nom = $data->nom;
        $this->editselect();
    }
    
    public function updateDistrict(){
        $this->validate([
          "nom" =>"required",
        ]);
        if ($this->dataId) {
            $data = District::find($this->dataId);
            $data->update([
                'nom' => $this->nom, 
               
            ]);
            $this->resetInputs();
        }
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=> "District mis à jour avec succès!"]);
      }
     //
     public function confirmDelete(District $district){
        $this->dispatchBrowserEvent("showConfirmMessage", ["message"=> [
            "text" => "Vous êtes sur le point pour supprimer? Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
            "type" => "warning",
            "data" => ["district_id" => $district->id]
        ]]);
    }
    
      public function deleteDistrict(District $district){
        $district->delete();
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"District supprimé avec succès!"]);
      }

    private function resetInputs()
      {
          $this->nom="";
      }
}
