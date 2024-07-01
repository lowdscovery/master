<?php

namespace App\Http\Livewire;

use App\Models\Rapport as ModelsRapport;
use App\Models\Intervenant as ModelsIntervenant;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Rapport extends Component
{
    use WithPagination,WithFileUploads;
    protected $paginationTheme = "bootstrap";
    public $search;
    public $addRapport = [];
    public $editRapport =[];
    public $input = false;
    public $editImage;
    public $resetValueInput =0;

    public function showInput(){
     $this->input = true;
    }
    public function cacheInput(){
        $this->input = false;
       }

       public function updatedSearch(){
        $this->resetPage();
    }
    
    public function render()
    {
        $searchCriteria = "%".$this->search."%";
       $data = [
        "rapports" => ModelsRapport::where("dateDebut","like",$searchCriteria)
        ->OrWhere("intervenant_id", "like", $searchCriteria)
        ->latest()->paginate(2),
        "inters" => ModelsIntervenant::get(),
       ];
        return view('livewire.rapport.rapport',$data)
        ->extends("layouts.principal")
        ->section("contenu");
    }

    protected function rules(){
        return[
            'editRapport.dateDebut'=> 'required',
            'editRapport.intervenant_id'=> 'required',
            'editRapport.lieu'=> 'required',
            'editRapport.motif'=> 'required',
           // 'editRapport.dateFin'=> 'required',
           //  'editImage'=> "required|mimes:pdf|max:10240",
        ];
    }

    public function addRapport(){
        $this->validate([
            "addRapport.dateDebut"=>"required",
            "addRapport.intervenant_id"=>"required",
            "addRapport.lieu"=>"required",
            "addRapport.motif"=>"required",
        ]);
        ModelsRapport::create([
            "dateDebut"=>$this->addRapport["dateDebut"],
            "intervenant_id"=>$this->addRapport["intervenant_id"],
            "lieu"=>$this->addRapport["lieu"],
            "motif"=>$this->addRapport["motif"],
        ]);
        $this->resetErrorBag();
        $this->addRapport = [];
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Rapport ajoutée avec succès!"]);
    }

    public function confirmDelete(ModelsRapport $rapport){
        $this->dispatchBrowserEvent("showConfirmMessage",[
            "message"=>
            [
                "text" => "Vous êtes sur le point de supprimer ". $rapport->lieu ." sur la liste des intervenants. Voulez-vous continuer?",
                "title" => "Êtes-vous sûr de continuer?",
                "type" => "warning",
                "data" => ["models_rapport_id" => $rapport->id]
            ]
        ]);
    }
    public function deleteRapport(ModelsRapport $rapport){
        $rapport->delete();
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Supprimé avec succès!"]);
      }

      //show input 
      public function editInput(ModelsRapport $rapport){
        $this->editRapport = $rapport->toArray();
        $this->showInput();
       }
       public function updateInput(){
        $this->validate([
            'editImage'=> "required|mimes:pdf|max:10240",
        ]);
        $rapport = ModelsRapport::find($this->editRapport["id"]);
        $rapport->fill($this->editRapport);

        if($this->editImage){
         $path = $this->editImage->store("rapport", "public");
         $imagePath = "storage/".$path;
         Storage::disk("local")->delete(str_replace("storage/", "public/", $rapport->rapport));
         $rapport->rapport = $imagePath;
     }

        $rapport->save();
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=> "Mis à jour avec succès!"]);
        $this->editRapport =[];
        $this->cacheInput();
        $this->resetValueInput++;
    }
//
      public function editRapport(ModelsRapport $rapport){
        $this->editRapport = $rapport->toArray();
      //  $this->showInput();
       }
       public function updateRapport(){
           $this->validate();
           $rapport = ModelsRapport::find($this->editRapport["id"]);
           $rapport->fill($this->editRapport);

           if($this->editImage){
            $path = $this->editImage->store("rapport", "public");
            $imagePath = "storage/".$path;
            Storage::disk("local")->delete(str_replace("storage/", "public/", $rapport->rapport));
            $rapport->rapport = $imagePath;
        }

           $rapport->save();
           $this->dispatchBrowserEvent("showSuccessMessage", ["message"=> "Mis à jour avec succès!"]);
           $this->editRapport =[];
           $this->cacheInput();
           $this->resetValueInput++;
       }
//show pdf
       public $documents;
       public $selectedDocument;

       public function mount(){
        $this->documents = ModelsRapport::all();
      }
      public function selectDocument($documentId){
        $this->selectedDocument = ModelsRapport::find($documentId);
      }
}
