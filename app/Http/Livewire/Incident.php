<?php

namespace App\Http\Livewire;

use App\Models\CaracteristiqueMoteur;
use App\Models\Incident as ModelsIncident;
use App\Models\Intervenant as ModelsIntervenant;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\MoteurElectrique;
use App\Models\MoteurPompe;

class Incident extends Component
{
    use WithPagination;
    protected $paginationTheme ="bootstrap";
    public $search = "";
    public $dateIncident,$indexCH,$natureIncident,$caracteristique_moteur_id;
    public $cause,$action,$resultat,$intervenant_id;
    public $datedebut;
    public $datefin;
    public $perPage = 5;
    public $selectedItem = '';

    //
    public $editId = null;

    public function mount()
{
    // Réinitialisation initiale du formulaire
    $this->resetForm();
}

public function resetForm()
{
    // Réinitialiser toutes les propriétés à des valeurs vides
    $this->editId = null;
    $this->dateIncident = '';
    $this->indexCH = '';
    $this->natureIncident = '';
    $this->selectedItem = '';
    $this->caracteristique_moteur_id = '';
    $this->cause = '';
    $this->action = '';
    $this->resultat = '';
    $this->intervenant_id = '';
}

public function cancelEdit()
{
    $this->resetForm(); // Réinitialiser le formulaire lorsqu'on annule l'édition
}
    //edit
   // public $editId;

    public function updatedSearch(){
        $this->resetPage();
    }

    
    public function render()
    {
        $query = ModelsIncident::query();

        if ($this->datedebut && $this->datefin) {
            $query->whereBetween('dateIncident', [$this->datedebut, $this->datefin]);
        }
        
        if (!empty($this->search)) {
            $query->where(function($q) {
                $q->where('intervenant_id', 'like', '%' . $this->search . '%')
                ->orWhere('caracteristique_moteur_id','like', '%' . $this->search . '%')
                  ->orWhere('type', 'like', '%' . $this->search . '%');
            });
        }
        $transactions = $query->orderBy('created_at', 'asc')->paginate(5);
      // $transactions = $query->latest()->paginate($this->perPage);
        
        $this->resetPage();

            $inters = ModelsIntervenant::get();
            $moteurs = MoteurElectrique::get();
            $pompes = MoteurPompe::get();

        return view('livewire.Incident.liste',[
            'transactions' => $transactions,
            'inters'=>$inters,
            'moteurs'=>$moteurs,
            'pompes'=>$pompes
            ])
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
            'type'=>$this->selectedItem,
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
        $this->selectedItem='';

        $this->resetForm();
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
        $this->selectedItem = $transaction->type;

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
            'type'=>$this->selectedItem,
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
        $this->selectedItem='';
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
   //affiche moteur et pompe
     

      public function updatedSelectedItem($value)
      {
        $this->caracteristique_moteur_id = '';
          $this->selectedItem = $value;
      }
}
