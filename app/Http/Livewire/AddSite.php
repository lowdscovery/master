<?php

namespace App\Http\Livewire;

use App\Models\District;
use App\Models\Site;
use Livewire\Component;
use Livewire\WithPagination;

class AddSite extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $nom;
    public $district_id;
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
            "districts" => District::all(),
            "sites" => Site::where("nom", "like", $searchCriteria)->latest()->paginate(5),
        //    "sites"=> Site::whereHas('dist',function($query){
        //     $query->where('nom', 'like', '%' .$this->search . '%')
        //     ->Orwhere('nom', 'like', '%' .$this->search . '%');
        // })->latest()->paginate(5),
          ];
        return view('livewire.addSite.add-site',$data)
        ->extends("layouts.principal")
        ->section("contenu");
    }

    public function AddSite(){
        $this->validate([
            "nom" =>"required",
            "district_id" =>"required",
        ]);
       
       Site::create(
            [
                "nom" => $this->nom,
                "district_id" => $this->district_id,         
            ]
         );
        $this->resetErrorBag();
        $this->resetInputs();
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Votre demande reussi avec succès!"]);
    }

     //
     public function editSite($id){
        $data = Site::findOrFail($id);
        $this->dataId = $id;
        $this->nom = $data->nom;
        $this->district_id = $data->district_id;
        $this->editselect();
    }
    
    public function updateSite(){
        $this->validate([
          "nom" =>"required",
          "district_id" =>"required",
        ]);
        if ($this->dataId) {
            $data = Site::find($this->dataId);
            $data->update([
                'nom' => $this->nom, 
                'district_id' => $this->district_id, 
               
            ]);
            $this->resetInputs();
        }
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=> "Site mis à jour avec succès!"]);
      }
     //
     public function confirmDelete(Site $site){
        $this->dispatchBrowserEvent("showConfirmMessage", ["message"=> [
            "text" => "Vous êtes sur le point pour supprimer? Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
            "type" => "warning",
            "data" => ["site_id" => $site->id]
        ]]);
    }
    
      public function deleteSite(Site $site){
        $site->delete();
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Site supprimé avec succès!"]);
      }

    private function resetInputs()
    {
        $this->nom="";$this->district_id="";
    }
}
