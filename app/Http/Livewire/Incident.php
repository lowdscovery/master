<?php

namespace App\Http\Livewire;

use App\Models\CaracteristiqueMoteur;
use App\Models\Incident as ModelsIncident;
use App\Models\Intervenant as ModelsIntervenant;
use Livewire\Component;
use Livewire\WithPagination;

class Incident extends Component
{
    use WithPagination;
    protected $paginationTheme ="bootstrap";
    public $search = "";
    public $changed;
    public $oldValue = [];
    public $addIncident = [];
    public $editIncident = [];

   //showButton
  

    public function render()
    {
        $searchCriteria = "%".$this->search."%";
        $data= [
            "incidents" => ModelsIncident::where("natureIncident","like",$searchCriteria)->latest()->paginate(5),
            "inters" => ModelsIntervenant::get(),
            "caracteristiques" => CaracteristiqueMoteur::get(),
        ];

        if($this->editIncident != []){
            $this->showButton();
        }

        return view('livewire.Incident.liste',$data)
        ->extends("layouts.principal")
        ->section("contenu");

    }
//showButton
    public function showButton(){
        $this->changed = false;
        if(
          $this->editIncident["dateIncident"] != $this->oldValue["dateIncident"] ||
          $this->editIncident["indexCH"] != $this->oldValue["indexCH"] ||
          $this->editIncident["heure"] != $this->oldValue["heure"] ||
          $this->editIncident["natureIncident"] != $this->oldValue["natureIncident"] ||
          $this->editIncident["cause"] != $this->oldValue["cause"] ||
          $this->editIncident["action"] != $this->oldValue["action"] ||
          $this->editIncident["resultat"] != $this->oldValue["resultat"] ||
          $this->editIncident["intervenant_id"] != $this->oldValue["intervenant_id"] ||
          $this->editIncident["caracteristique_moteur_id"] != $this->oldValue["caracteristique_moteur_id"]
          ){
          $this->changed = true;
         }
      }

    //rules
    protected function rules(){
        return[
            'editIncident.dateIncident'=> 'required',
            'editIncident.indexCH'=> 'required',
            'editIncident.heure'=> 'required',
            'editIncident.natureIncident'=> 'required',
            'editIncident.cause'=> 'required',
            'editIncident.action'=> 'required',
            'editIncident.resultat'=> 'required',
            'editIncident.intervenant_id'=> 'required',
            'editIncident.caracteristique_moteur_id'=> 'required',
        ];
      }

    public function addIncident(){
        $this->validate([
            "addIncident.dateIncident"=> "string|required",
            "addIncident.indexCH"=> "string|required",
            "addIncident.heure"=> "string|required",
            "addIncident.natureIncident"=> "string|required",
            "addIncident.cause"=> "string|required",
            "addIncident.action"=> "string|required",
            "addIncident.resultat"=> "string|required",
            "addIncident.intervenant_id"=> "string",
            "addIncident.caracteristique_moteur_id"=> "string",
        ]);

        ModelsIncident::create([
            "dateIncident" => $this->addIncident["dateIncident"],
            "indexCH" => $this->addIncident["indexCH"],
            "heure" => $this->addIncident["heure"],
            "natureIncident" => $this->addIncident["natureIncident"],
            "cause" => $this->addIncident["cause"],
            "action" => $this->addIncident["action"],
            "resultat" => $this->addIncident["resultat"],
            "intervenant_id" => $this->addIncident["intervenant_id"],
            "caracteristique_moteur_id" => $this->addIncident["caracteristique_moteur_id"],
        ]);
    $this->resetErrorBag();
    $this->addIncident = [];
  //  session()->flash('message', 'Incident ajoutée avec succès!');
    $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Incident ajoutée avec succès!"]);
    }


      //supression
      public function confirmDelete(ModelsIncident $incident){
        $this->dispatchBrowserEvent("showConfirmMessage", [
            "message"=> 
        [
            "text" => "Vous êtes sur le point de supprimer ". $incident->cause ." sur la liste des intervenants. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
            "type" => "warning",
            "data" => ["models_incident_id" => $incident->id]
        ]]);
    }

    public function deleteIncident(ModelsIncident $incident){
        $incident->delete();
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"L'incident supprimé avec succès!"]);
      }
      //modifier
    public function editIncident(ModelsIncident $incident){
     $this->editIncident = $incident->toArray();

     $this->oldValue = $this->editIncident;
    }
    public function updateIncident(){
        $this->validate();
        $incident = ModelsIncident::find($this->editIncident["id"]);
        $incident->fill($this->editIncident);
        $incident->save();
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=> "Incident mis à jour avec succès!"]);
    }
}
