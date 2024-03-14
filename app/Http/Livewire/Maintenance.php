<?php

namespace App\Http\Livewire;

use App\Models\Maintenance as ModelsMaintenance;
use Livewire\Component;

class Maintenance extends Component
{
    public $search = "";

    public function render()
    {
       $searchCriteria = "%".$this->search."%";
       $data = [
        "maintenances" => ModelsMaintenance::where("intervenant","like",$searchCriteria)->latest()->paginate(5),
       ];
        return view('livewire.maintenance.maintenance', $data)
        ->extends("layouts.principal")
        ->section("contenu");
    }
}
