<?php

namespace App\Http\Livewire;

use App\Models\Commande as ModelsCommande;
use Livewire\Component;
use App\Models\CaracteristiqueMoteur;
use Livewire\WithPagination;

class Commande extends Component
{
    public $search = "";
    use WithPagination;
    public $addCommande = [];
    protected $paginationTheme ="bootstrap";
    public $editCommande = [];


    public function updatedSearch(){
        $this->resetPage();
    }
    
    public function render()
    {
        $searchCriteria = "%".$this->search."%";
        $data = [
        "commandes" => ModelsCommande::where("motif","like",$searchCriteria)->latest()->paginate(5),
        "caracteristiques" => CaracteristiqueMoteur::get(),
        ];
        return view('livewire.commande.commande', $data)
        ->extends("layouts.principal")
        ->section("contenu");
    }

    protected function rules(){
        return[
            'editCommande.dateCommande'=> 'required',
            'editCommande.motif'=> 'required',
            'editCommande.article'=> 'required',
            'editCommande.reference'=> 'required',
            'editCommande.quantiteCommande'=> 'required',
            'editCommande.numeroDA'=> 'required',
            'editCommande.Situation'=> 'required',
            'editCommande.quantiteReception'=> 'required',
            'editCommande.dateReception'=> 'required',
            'editCommande.observation'=> 'required',
            'editCommande.caracteristique'=> 'required',
        ];
    }


    public function addCommande(){
        $this->validate([
            "addCommande.dateCommande"=>"required",
            "addCommande.motif"=>"required",
            "addCommande.article"=>"required",
            "addCommande.reference"=>"required",
            "addCommande.quantiteCommande"=>"required",
            "addCommande.numeroDA"=>"required",
            "addCommande.Situation"=>"required",
            "addCommande.quantiteReception"=>"required",
            "addCommande.dateReception"=>"required",
            "addCommande.observation"=>"required",
            "addCommande.caracteristique"=>"required",
        ]);
        ModelsCommande::create([
            "dateCommande"=>$this->addCommande["dateCommande"],
            "motif"=>$this->addCommande["motif"],
            "article"=>$this->addCommande["article"],
            "reference"=>$this->addCommande["reference"],
            "quantiteCommande"=>$this->addCommande["quantiteCommande"],
            "numeroDA"=>$this->addCommande["numeroDA"],
            "Situation"=>$this->addCommande["Situation"],
            "quantiteReception"=>$this->addCommande["quantiteReception"],
            "dateReception"=>$this->addCommande["dateReception"],
            "observation"=>$this->addCommande["observation"],
            "caracteristique"=>$this->addCommande["caracteristique"],
        ]);
        $this->resetErrorBag();
        $this->addCommande = [];
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Commande ajoutée avec succès!"]);
    }

    //suppression
    public function confirmDelete(ModelsCommande $commande){
        $this->dispatchBrowserEvent("showConfirmMessage", [
            "message"=> 
        [
            "text" => "Vous êtes sur le point de supprimer ". $commande->article ." sur la liste des commandes. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
            "type" => "warning",
            "data" => ["models_commande_id" => $commande->id]
        ]]);
    }
    public function deleteCommande(ModelsCommande $commande){
        $commande->delete();
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Le commande supprimé avec succès!"]);
      }
         //edit
    public function editCommande(ModelsCommande $commande){
        $this->editCommande = $commande->toArray();
       }
   public function updateCommande(ModelsCommande $commande){
    $this->validate();
    $commande = ModelsCommande::find($this->editCommande["id"]);
    $commande->fill($this->editCommande);
    $commande->save();
    $this->dispatchBrowserEvent("showSuccessMessage", ["message"=> "Mis à jour avec succès!"]);
    }
}
