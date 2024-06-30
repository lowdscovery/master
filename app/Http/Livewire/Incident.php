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
    public $dateIncident,$indexCH,$natureIncident,$caracteristique_moteur_id;
    public $cause,$action,$resultat,$intervenant_id;
   // public $transactions;

    //edit
    public $editId;

    public function updatedSearch(){
        $this->resetPage();
    }
    
    public function render()
    {
      //  $this->transactions = ModelsIncident::all();
        $searchCriteria = "%".$this->search."%";
        $data= [
            "transactions" => ModelsIncident::where("natureIncident","like",$searchCriteria)->latest()->paginate(5),
            "inters" => ModelsIntervenant::get(),
            "caracteristiques" => CaracteristiqueMoteur::get(),
        ];

        return view('livewire.Incident.liste',$data)
        ->extends("layouts.principal")
        ->section("contenu");

    }
   
    public function addTransaction(){
        $lastTransaction = ModelsIncident::latest()->first();
        $oldValue = $lastTransaction ? $lastTransaction->indexCH : 0;
        $difference = $this->indexCH - $oldValue;
        ModelsIncident::create([
            'indexCH' => $this->indexCH,
            'old_value' => $oldValue,
            'dateIncident' => $this->dateIncident,
            'natureIncident' => $this->natureIncident,
            'caracteristique_moteur_id' => $this->caracteristique_moteur_id,
            'cause' => $this->cause,
            'action' => $this->action,
            'resultat' => $this->resultat,
            'intervenant_id' => $this->intervenant_id,
           // 'old_value' => $oldValue,
            'heure' => $difference,
        ]);
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Incident ajoutée avec succès!"]);
     //   $this->transactions = ModelsIncident::all();
        $this->indexCH = '';
        $this->dateIncident = '';
        $this->natureIncident = '';
        $this->caracteristique_moteur_id = '';
        $this->cause = '';
        $this->action = '';
        $this->resultat = '';
        $this->intervenant_id = '';
    }

   
//update
    public function editTransaction($id){
        $transaction = ModelsIncident::find($id);
        $this->editId = $id;
        $this->indexCH = $transaction->indexCH;
        $this->dateIncident = $transaction->dateIncident;
        $this->natureIncident = $transaction->natureIncident;
        $this->caracteristique_moteur_id = $transaction->caracteristique_moteur_id;
        $this->cause = $transaction->cause;
        $this->action = $transaction->action;
        $this->resultat = $transaction->resultat;
        $this->intervenant_id = $transaction->intervenant_id;

    }
    //update
    public function updateTransaction(){
        $transaction = ModelsIncident::find($this->editId);
        $oldValue = $transaction->old_value;
        $difference = $this->indexCH - $oldValue;
        $transaction->update([
            'indexCH' => $this->indexCH,
            'dateIncident' => $this->dateIncident,
            'natureIncident' => $this->natureIncident,
            'caracteristique_moteur_id' => $this->caracteristique_moteur_id,
            'cause' => $this->cause,
            'action' => $this->action,
            'resultat' => $this->resultat,
            'intervenant_id' => $this->intervenant_id,
            'heure' => $difference,
        ]);
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=> "Incident mis à jour avec succès!"]);
      // $this->transactions = ModelsIncident::all();
        $this->indexCH = '';
        $this->dateIncident = '';
        $this->natureIncident = '';
        $this->caracteristique_moteur_id = '';
        $this->cause = '';
        $this->action = '';
        $this->resultat = '';
        $this->intervenant_id = '';
        $this->editId = null;
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
   /* use WithPagination;
    protected $paginationTheme ="bootstrap";
    public $search = "";
    public $changed;
    public $oldValue = [];
    public $addIncident = [];
    public $editIncident = [];

    public $previousValue;
    public $indexCH;
    public $heure;

    public function mount(){
        $lastTransaction = ModelsIncident::latest()->first();
        $this->previousValue = $lastTransaction ? $lastTransaction->indexCH : 1;
        }
  

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
            'indexCH'=> 'required',
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
           //"addIncident.indexCH"=> "numeric|required",
            "indexCH"=> "numeric|required",
            "addIncident.natureIncident"=> "string|required",
            "addIncident.cause"=> "string|required",
            "addIncident.action"=> "string|required",
            "addIncident.resultat"=> "string|required",
            "addIncident.intervenant_id"=> "string",
            "addIncident.caracteristique_moteur_id"=> "string",
        ]);
        $this->heure = $this->indexCH - $this->previousValue;
        ModelsIncident::create([
            "dateIncident" => $this->addIncident["dateIncident"],
          //"indexCH" => $this->addIncident["indexCH"],
            "indexCH" => $this->indexCH,
            "heure" => $this->heure,
            "natureIncident" => $this->addIncident["natureIncident"],
            "cause" => $this->addIncident["cause"],
            "action" => $this->addIncident["action"],
            "resultat" => $this->addIncident["resultat"],
            "intervenant_id" => $this->addIncident["intervenant_id"],
            "caracteristique_moteur_id" => $this->addIncident["caracteristique_moteur_id"],
        ]);
        $this->previousValue = $this->indexCH;
        $this->reset('indexCH');

    $this->resetErrorBag();
    $this->addIncident = [];
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
     $this->indexCH = $incident['indexCH'];
     $this->oldValue = $this->editIncident;
    }
    public function updateIncident(){
        $this->validate();
        $incident = ModelsIncident::find($this->editIncident["id"]);
        $incident->fill($this->editIncident);
        $incident->save();
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=> "Incident mis à jour avec succès!"]);
    }*/
}
