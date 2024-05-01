<?php

namespace App\Http\Livewire;

use App\Models\Upload;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class Uploads extends Component
{
    use WithFileUploads;
    public $title;
    public $filename;
    public $date;
    public $date1;
    public $daty;
    public $da;

    
   

    public function fileUpload(){
        sleep(3);
        $validatedData = $this->validate([
          'title'=> 'required',
          'filename'=> 'image|max:10240',
        ]);

        $filename = $this->filename->store('files', 'public');
        $validatedData['filename'] = $filename;
        
        Upload::create($validatedData);
        session()->flash('message', 'File successfully uploaded!');
      //  $this->emit('fileUpload');
    }
    public function render()
    {
     
      $data = [
        //notification//"somme" =>Upload::where("title","3")->count(),
        "somme" =>Upload::where("title","")->sum("id"),
                 ];
        return view('livewire.uploads',$data)
        ->extends("layouts.principal")
        ->section("contenu");
    }

   /* public function dat(){
      $date = Carbon::parse('2024-04-10');
      $daty = today()->diffInDays($date);
      return $daty;
    }*/
    public function dat(){
      $this->date = Carbon::make('23-04-01');
      $this->date1 = Carbon::make('23-04-10');
      $this->da= $this->date->diffInDays($this->date1);
    }

}
