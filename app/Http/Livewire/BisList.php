<?php

namespace App\Http\Livewire;

use App\Models\Bis;
use App\Models\CaracteristiqueMoteur;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\MoteurElectrique;
use App\Models\MoteurPompe;
use App\Models\Forage;

class BisList extends Component
{
    public $search = "";
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $addBis = [];
    public $editBis = [];
   // public $selectedItem = '';


   /* public function updatedSelectedItem($value)
   {
       $this->caracteristique = '';
       $this->selectedItem = $value;
   }*/

    public function updatedSearch(){
        $this->resetPage();
    }
    
    public function render()
    {
        $searchCriteria = "%".$this->search."%";
        $data = [
        "biss" => Bis::where("dateDePose","like",$searchCriteria)
                       ->orwhere("caracteristique","like",$searchCriteria)->latest()->paginate(5),
        "caracteristiques" => CaracteristiqueMoteur::get(),
        "moteurs" => MoteurElectrique::get(),
        "pompes" => MoteurPompe::get(),
        "forages" => Forage::all(),
        ];
        return view('livewire.bis.list',$data)
        ->extends("layouts.principal")
        ->section("contenu");
    }

    protected function rules(){
        return[
            'editBis.repere'=> 'required',
            'editBis.designation'=> 'required',
            'editBis.marque'=> 'required',
            'editBis.type'=> 'required',
            'editBis.Dn'=> 'required',
            'editBis.Pn'=> 'required',
            'editBis.dateDePose'=> 'required',
            'editBis.tarage'=> 'required',
            'editBis.caracteristique'=> 'required',
        ];
    }

    //add
    public function addBis(){
        $this->validate([
            "addBis.repere"=>"required",
            "addBis.designation"=>"required",
            "addBis.marque"=>"required",
            "addBis.type"=>"required",
            "addBis.Dn"=>"required",
            "addBis.Pn"=>"required",
            "addBis.dateDePose"=>"required",
            "addBis.tarage"=>"required",
            "addBis.caracteristique"=>"required",
        ]);
        Bis::create([
            "repere"=>$this->addBis["repere"],
            "designation"=>$this->addBis["designation"],
            "marque"=>$this->addBis["marque"],
            "type"=>$this->addBis["type"],
            "Dn"=>$this->addBis["Dn"],
            "Pn"=>$this->addBis["Pn"],
            "dateDePose"=>$this->addBis["dateDePose"],
            "tarage"=>$this->addBis["tarage"],
            "caracteristique"=>$this->addBis["caracteristique"],
          //  'typemoteur' => $this->selectedItem,
        ]);
        $this->resetErrorBag();
        $this->addBis = [];
      //  $this->selectedItem="";
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Bis ajoutée avec succès!"]);
    }

    //update
    public function editBis(Bis $bis){
        $this->editBis = $bis->toArray();
    //    $this->selectedItem = $this->editBis['typemoteur'];
       }
   public function updateCommande(Bis $bis){
    $this->validate();
    $bis = Bis::find($this->editBis["id"]);
  //  $this->editBis['typemoteur'] = $this->selectedItem;
    $bis->fill($this->editBis);
    $bis->save();
    $this->editBis = [];
   // $this->selectedItem="";
    $this->dispatchBrowserEvent("showSuccessMessage", ["message"=> "Mis à jour avec succès!"]);
    }

    //delete modal pompe
    public function confirmDelete(Bis $bis){
        $this->dispatchBrowserEvent("showConfirmMessage", [
            "message"=> 
        [
            "text" => "Vous êtes sur le point de supprimer ". $bis->marque ." sur la liste des bis. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
            "type" => "warning",
            "data" => ["bis_id" => $bis->id]
        ]]);
    }
    public function deleteBis(Bis $bis){
        $bis->delete();
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Le bis supprimé avec succès!"]);
      }

      public function cancel(){
        $this->editBis = [];
     //   $this->selectedItem="";
      }
}
