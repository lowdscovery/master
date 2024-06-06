<?php

namespace App\Http\Livewire;

use App\Models\Upload;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class Uploads extends Component
{
    use WithFileUploads;
    public $nom;
    public $password;
    public $password_confirmation;
    public $photo;

    public function mount()
    {
        $user = Auth::user();
        $this->nom = $user->nom;
    }

    public function updatedProfileImage()
    {
        $this->validate([
            'photo' => 'image|max:1024', // 1MB Max
        ]);
    }

    public function updateProfile()
    {
        $this->validate([
            'nom' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
            'photo' => 'nullable|image|max:1024', // 1MB Max
        ]);

        $user = Auth::user();
        $user->nom = $this->nom;

        if ($this->password) {
            $user->password = Hash::make($this->password);
        }

        if ($this->photo) {
            $path = $this->photo->store('upload', 'public');
            $user->photo = $path;
        }

        $user->save();

        // Rafraîchit les données utilisateur après la mise à jour
        $this->emit('userProfileUpdated');

        session()->flash('message', 'Profil mis à jour avec succès.');
    }

    public function render()
    {
        return view('livewire.uploads')
        ->extends("layouts.principal")
        ->section("contenu");
    }


}
