<?php

namespace App\Http\Livewire;

use App\Models\Ressource;
use App\Models\Site;
use Livewire\Component;
use Livewire\WithPagination;

class AddForage extends Component
{

    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $nom;
    public $site_id;
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
            "ressources" => Ressource::where("nom", "like", $searchCriteria)->latest()->paginate(5),
            "sites" => Site::all(),
          ];
        return view('livewire.addForage.add-forage',$data)
        ->extends("layouts.principal")
        ->section("contenu");
    }

    public function AddRessource(){
        $this->validate([
            "nom" =>"required",
            "site_id" =>"required",
        ]);
       
       Ressource::create(
            [
                "nom" => $this->nom,
                "site_id" => $this->site_id,         
            ]
         );
        $this->resetErrorBag();
        $this->resetInputs();
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Votre demande reussi avec succès!"]);
    }
     //
     public function editRessource($id){
        $data = Ressource::findOrFail($id);
        $this->dataId = $id;
        $this->nom = $data->nom;
        $this->site_id = $data->site_id;
        $this->editselect();
    }
    
    public function updateRessource(){
        $this->validate([
          "nom" =>"required",
          "site_id" =>"required",
        ]);
        if ($this->dataId) {
            $data = Ressource::find($this->dataId);
            $data->update([
                'nom' => $this->nom, 
                'site_id' => $this->site_id, 
               
            ]);
            $this->resetInputs();
        }
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=> "Ressource mis à jour avec succès!"]);
      }
    //
    public function confirmDelete(Ressource $ressource){
        $this->dispatchBrowserEvent("showConfirmMessage", ["message"=> [
            "text" => "Vous êtes sur le point pour supprimer? Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
            "type" => "warning",
            "data" => ["ressource_id" => $ressource->id]
        ]]);
    }
    
      public function deleteRessource(Ressource $ressource){
        $ressource->delete();
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Ressource supprimé avec succès!"]);
      }

    private function resetInputs()
    {
        $this->nom="";$this->site_id="";
    }
}
