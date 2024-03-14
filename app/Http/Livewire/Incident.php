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
          $this->editIncident["intervenant"] != $this->oldValue["intervenant"] ||
          $this->editIncident["marque|numero"] != $this->oldValue["marque|numero"]
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
            'editIncident.intervenant'=> 'required',
            'editIncident.marque|numero'=> 'required',
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
            "addIncident.intervenant"=> "string",
            "addIncident.marque|numero"=> "string",
        ]);

        ModelsIncident::create([
            "dateIncident" => $this->addIncident["dateIncident"],
            "indexCH" => $this->addIncident["indexCH"],
            "heure" => $this->addIncident["heure"],
            "natureIncident" => $this->addIncident["natureIncident"],
            "cause" => $this->addIncident["cause"],
            "action" => $this->addIncident["action"],
            "resultat" => $this->addIncident["resultat"],
            "intervenant" => $this->addIncident["intervenant"],
            "marque|numero" => $this->addIncident["marque|numero"],
        ]);
    $this->resetErrorBag();
    $this->addIncident = [];
    $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Incident ajoutée avec succès!"]);
    }


      //supression
      public function confirmDelete(ModelsIncident $incident){
        $this->dispatchBrowserEvent("showConfirmMessage", ["message"=> [
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
