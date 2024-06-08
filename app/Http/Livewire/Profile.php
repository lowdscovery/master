<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;
    public $nom;
    public $prenom;
    public $sexe;
    public $telephone1;
    public $pieceIdentite;
    public $numeroPieceIdentite;
    public $email;
    public $password;
    public $password_confirmation;
    public $photo;

    public function mount()
    {
        $user = Auth::user();
        $this->nom = $user->nom;
        $this->prenom = $user->prenom;
        $this->sexe = $user->sexe;
        $this->telephone1 = $user->telephone1;
        $this->pieceIdentite = $user->pieceIdentite;
        $this->numeroPieceIdentite = $user->numeroPieceIdentite;
        $this->email = $user->email;
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
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'sexe' => 'required|string|max:255',
            'telephone1' => 'required|numeric',
            'pieceIdentite' => 'required|string|max:255',
            'numeroPieceIdentite' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'nullable|string|min:8|confirmed',
            'photo' => 'nullable|image|max:10240', // 1MB Max
        ]);

        $user = Auth::user();
        $user->nom = $this->nom;
        $user->prenom = $this->prenom;
        $user->sexe = $this->sexe;
        $user->telephone1 = $this->telephone1;
        $user->pieceIdentite = $this->pieceIdentite;
        $user->numeroPieceIdentite = $this->numeroPieceIdentite;
        $user->email = $this->email;

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

        // Rafraîchit les données utilisateur après la mise à jour
        $this->emit('userProfileUpdated');
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=> "Profile à jour avec succès!"]);
       // session()->flash('message', 'Profil mis à jour avec succès.');
    }

    public function render()
    {
        return view('livewire.profile')
        ->extends("layouts.principal")
        ->section("contenu");
    }


}
