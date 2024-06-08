<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Password extends Component
{
    use WithFileUploads;
    public $password;
    public $password_confirmation;
    public $photo;

    public function mount()
    {
        $user = Auth::user();
    }

    public function updatedProfileImage()
    {
        $this->validate([
            'photo' => 'image|max:10240', // 1MB Max
        ]);
    }

    public function updateProfile()
    {
        $this->validate([
            'password' => 'nullable|string|min:8|confirmed',
            'photo' => 'nullable|image|max:10240', // 1MB Max
        ]);

        $user = Auth::user();

        if ($this->password) {
            $user->password = Hash::make($this->password);
        }

        if($this->photo){
            $path = $this->photo->store("files", "public");
            $imagePath = "storage/".$path;
            Storage::disk("local")->delete(str_replace("storage/", "public/", $user->photo));
            $user->photo = $imagePath;
        }

        $user->save();

        $this->password_confirmation="";
        $this->password="";

        // Rafraîchit les données utilisateur après la mise à jour
        $this->emit('userProfileUpdated');

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=> "Mot de passe à jour avec succès!"]);
    }

    public function render()
    {
        return view('livewire.password')
        ->extends("layouts.principal")
        ->section("contenu");
    }


}
