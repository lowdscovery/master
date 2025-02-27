<?php

namespace App\Http\Livewire;

use App\Models\Maintenance as ModelsMaintenance;
use App\Models\Intervenant as ModelsIntervenant;
use App\Models\CaracteristiqueMoteur;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use App\Models\MoteurElectrique;
use App\Models\MoteurPompe;

class Maintenance extends Component
{
    use WithPagination,WithFileUploads;
    protected $paginationTheme = "bootstrap";
    public $search = "";
    public $dateMaintenance,$intervenant_id,$DureeIntervention,$caracteristique_moteurs_id,$actionEntreprise;
    public $DureeReel;
    public $editImage;
    public $button = true;
    public $resetValueInput =0;
    public $perPage = 6;
    public $datedebut;
    public $datefin;
    public $currentPage = PAGELIST;

    public $selectedItem = '';
    public $editId = null;
    //
    public function updatedPerPage(){
        $this->resetPage();
    }
    public function updatedSearch(){
        $this->resetPage();
    }

    public $input = false;
    public function showInput(){
        $this->input = true;
       }
       public function cacheInput(){
           $this->input = false;
          }
    //calcute date
    public $dates = false;
    public $events;


    public function cacheButton(){
        $this->button = false;
    }

   
    public function mount(){
       $this->resetForm();
    }

    public function detaille(){
        $this->currentPage=DETAILLEMAINTENANCE;
      }
      public function showDetaille(){
        $this->currentPage=PAGELIST;
      }
    public function render()
    {
        $query = ModelsMaintenance::query();

        if ($this->datedebut && $this->datefin) {
            $query->whereBetween('dateMaintenance', [$this->datedebut, $this->datefin]);
        }
        
        if (!empty($this->search)) {
            $query->where(function($q) {
                $q->where('intervenant_id', 'like', '%' . $this->search . '%')
                 ->orWhere('caracteristique_moteurs_id','like', '%' . $this->search . '%')
                   ->orWhere('status', 'like', '%' . $this->search . '%')
                   ->orWhere('type', 'like', '%' . $this->search . '%');
            });
        }
        $maintenances = $query->paginate($this->perPage);

        $this->documents = ModelsMaintenance::all();
        $today = Carbon::today();
        $this->events = ModelsMaintenance::all();
        $this->dates = ModelsMaintenance::whereDate('dateMaintenance', $today)->exists();

       $searchCriteria = "%".$this->search."%";
       $data = [
        // "maintenances" => ModelsMaintenance::where("dateMaintenance","like",$searchCriteria)
        // ->OrWhere("intervenant_id", "like", $searchCriteria)
        // ->latest()->paginate($this->perPage),
        "inters" => ModelsIntervenant::get(),
        "moteurs" => MoteurElectrique::get(),
        "pompes" => MoteurPompe::get(),
        'maintenances' => $maintenances,
        
       ];
      // $this ->mount();
        return view('livewire.maintenance.maintenance', $data)
        ->extends("layouts.principal")
        ->section("contenu");
    }

    public function resetForm()
{
    // Réinitialiser toutes les propriétés à des valeurs vides
    $this->editId = null;
    $this->dateMaintenance = '';
    $this->actionEntreprise = '';
    $this->DureeIntervention = '';
    $this->intervenant_id = '';
    $this->caracteristique_moteurs_id = '';
    $this->selectedItem='';
    $this->DureeReel = '';
}

public function cancelEdit()
{
    $this->resetForm(); // Réinitialiser le formulaire lorsqu'on annule l'édition
    $this->cache();
}

    public function addTransaction(){
        ModelsMaintenance::create([
            'dateMaintenance' => $this->dateMaintenance,
            'actionEntreprise' => $this->actionEntreprise,
            'DureeIntervention' => $this->DureeIntervention,
            'intervenant_id' => $this->intervenant_id,
            'caracteristique_moteurs_id' => $this->caracteristique_moteurs_id,
            'type' => $this->selectedItem,
        ]);
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Maintenance ajoutée avec succès!"]);
        $this->editId = null;
        $this->dateMaintenance = '';
        $this->actionEntreprise = '';
        $this->DureeIntervention = '';
        $this->intervenant_id = '';
        $this->caracteristique_moteurs_id = '';
        $this->selectedItem='';
        $this->resetForm();
    }

   
//update
    public function editTransaction($id){
        $transaction = ModelsMaintenance::find($id);
        $this->editId = $id;
        $this->dateMaintenance = $transaction->dateMaintenance;
        $this->actionEntreprise = $transaction->actionEntreprise;
        $this->DureeIntervention = $transaction->DureeIntervention;
        $this->intervenant_id = $transaction->intervenant_id;
        $this->caracteristique_moteurs_id = $transaction->caracteristique_moteurs_id;
        $this->DureeReel=$transaction->DureeReel;
        $this->selectedItem = $transaction->type;
        if($this->DureeReel!==null){
            $this->show();
        }
    }
    //update
    public function updateTransaction(){
        $transaction = ModelsMaintenance::find($this->editId);
        $transaction->update([
            'dateMaintenance' => $this->dateMaintenance,
            'actionEntreprise' => $this->actionEntreprise,
            'DureeIntervention' => $this->DureeIntervention,
            'intervenant_id' => $this->intervenant_id,
            'caracteristique_moteurs_id' => $this->caracteristique_moteurs_id,
            'DureeReel'=> $this->DureeReel,
            'type'=>$this->selectedItem,
        ]);

        if($this->editImage){
            $path = $this->editImage->store("maintenance", "public");
            $imagePath = "storage/".$path;
            Storage::disk("local")->delete(str_replace("storage/", "public/", $transaction->Rapport));
            $transaction->Rapport = $imagePath;
        }
        $transaction->save();
        
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=> "Maintenance mis à jour avec succès!"]);
        $this->dateMaintenance = '';
        $this->actionEntreprise = '';
        $this->DureeIntervention = '';
        $this->intervenant_id='';
        $this->caracteristique_moteurs_id = '';
        $this->editId = null;
        $this->selectedItem='';
        $this->DureeReel='';
    }



    public function confirmDelete(ModelsMaintenance $maintenance){
        $this->dispatchBrowserEvent("showConfirmMessage",[
            "message"=>
            [
                "text" => "Vous êtes sur le point de supprimer ". $maintenance->intervenant_id ." sur la liste des intervenants. Voulez-vous continuer?",
                "title" => "Êtes-vous sûr de continuer?",
                "type" => "warning",
                "data" => ["models_maintenance_id" => $maintenance->id]
            ]
        ]);
    }
    public function deleteMaintenance(ModelsMaintenance $maintenance){
        $maintenance->delete();
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Supprimé avec succès!"]);
      }

    //edit
    public function editInput(ModelsMaintenance $maintenance){
        $this->editMaintenance = $maintenance->toArray();
        $this->showInput();
        
       }
       public function updateInput(){
        $this->validate([
            'editImage'=> "required|mimes:pdf|max:10240",
        ]);
        $maintenance = ModelsMaintenance::find($this->editMaintenance["id"]);
        $maintenance->fill($this->editMaintenance);
        //status
        $maintenance->status = 'Null';

        if($this->editImage){
            $path = $this->editImage->store("maintenance", "public");
            $imagePath = "storage/".$path;
            Storage::disk("local")->delete(str_replace("storage/", "public/", $maintenance->Rapport));
            $maintenance->Rapport = $imagePath;
        }
        $maintenance->save();
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=> "Mis à jour avec succès!"]);
        $this->resetValueInput++;
        $this->editMaintenance = [];
        $this->cacheInput();
    }


    //show pdf
    public $documents;
    public $selectedDocument;

   public function selectDocument($documentId){
     $this->selectedDocument = ModelsMaintenance::find($documentId);
   }

   //affiche moteur et pompe
   public function updatedSelectedItem($value)
   {
       $this->caracteristique_moteurs_id = '';
       $this->selectedItem = $value;
   }

   public $cacheRapport = false;
   public function show(){
    $this->cacheRapport = true;
   }
   public function cache(){
    $this->cacheRapport=false;
   }

   //lancer programmer
   public function startMaintenance($id)
{
    $maintenance = ModelsMaintenance::find($id);
    $maintenance->status = 'en_cours';
    $maintenance->save();

    session()->flash('message', 'La maintenance a démarré avec succès.');
}

// if($this->DureeReel!==null){
//     $this->show();
// }


}
