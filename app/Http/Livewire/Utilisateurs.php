<?php

namespace App\Http\Livewire;

use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Utilisateurs extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $isBtnAddClicked=false;
    public $newUser = [];

    protected $rules = [
        'newUser.nom' => 'required',
        'newUser.prenom' => 'required',
        'newUser.email' => 'required|email|unique:users,email',
        'newUser.telephone1' => 'required|numeric|unique:users,telephone1',
        'newUser.pieceIdentite' => 'required',
        'newUser.sexe' => 'required',
        'newUser.numeroPieceIdentite' => 'required|unique:users,numeroPieceIdentite',
    ];

    protected $messages = ['newUser.nom.required' => "Le nom de l'utilisateur est requis.", ];

    public function render()
    {
        Carbon::setLocale("fr");
        return view('livewire.utilisateurs.index',[
            "users" => User::latest()->paginate(5)
        ])
        ->extends("layouts.principal")
        ->section("contenu");
    }

    public function goToAddUser(){
        $this->isBtnAddClicked=true;
    }
    public function goToListUser(){
        $this->isBtnAddClicked=false;
    }
    //partie ajouter
    public function addUser(){
        // Vérifier que les informations envoyées par le formulaire sont correctes
       $validationAttributes = $this->validate();
       $validationAttributes["newUser"]["password"] = "password";
      // dump($validationAttributes);
     // Ajouter un nouvel utilisateur
       User::create($validationAttributes["newUser"]);
       //reinitialiser le formulaire
       $this->newUser = [];
       $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Utilisateur créé avec succès!"]);
    }

//partie de suppression
public function confirmDelete($name, $id){
    $this->dispatchBrowserEvent("showConfirmMessage", ["message"=> [
        "text" => "Vous êtes sur le point de supprimer $name de la liste des utilisateurs. Voulez-vous continuer?",
        "title" => "Êtes-vous sûr de continuer?",
        "type" => "warning",
        "data" => [
            "user_id" => $id
        ]
    ]]);
}  

public function deleteUser($id){
    User::destroy($id);

    $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Utilisateur supprimé avec succès!"]);
}

}
