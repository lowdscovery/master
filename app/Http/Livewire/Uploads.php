<?php

namespace App\Http\Livewire;

use App\Models\Upload;
use Livewire\Component;
use Livewire\WithFileUploads;

class Uploads extends Component
{
    use WithFileUploads;
    public $title;
    public $filename;

   

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
        return view('livewire.uploads')
        ->extends("layouts.principal")
        ->section("contenu");
    }
}
