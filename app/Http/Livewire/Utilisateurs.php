<?php

namespace App\Http\Livewire;

use App\Models\Notification;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Notifications\UserFollowNotification;
use Illuminate\Support\Facades\Auth;

class Utilisateurs extends Component
{
    use WithFileUploads,WithPagination;
    protected $paginationTheme = "bootstrap";
    //public $isBtnAddClicked=false;
    public $newUser = [];
    public $editUser = [];
    public $currentPage = PAGELIST;
    public $rolePermissions = [];
    public $search = "";
    public $image;
    public $resetValueInput = 0;
    public $editImage;
    public $password;

    public $perPage = 6;
    public $sortDirection = 'ASC';
    public $sortColumn = 'Nom';

    public function doSort($column){
     if($this->sortColumn === $column){
        $this->sortDirection = ($this->sortDirection == 'ASC')? 'DESC':'ASC';
        return;
     }
     $this->sortColumn = $column;
     $this->sortDirection = 'ASC';
    }
    //reset recherche
    public function updatedPerPage(){
        $this->resetPage();
    }
    public function updatedSearch(){
        $this->resetPage();
    }

    /*protected $rules = [
        'newUser.nom' => 'required',
        'newUser.prenom' => 'required',
        'newUser.email' => 'required|email|unique:users,email',
        'newUser.telephone1' => 'required|numeric|unique:users,telephone1',
        'newUser.pieceIdentite' => 'required',
        'newUser.sexe' => 'required',
        'newUser.numeroPieceIdentite' => 'required|unique:users,numeroPieceIdentite',
    ];*/
    public function rules(){
        if($this->currentPage == PAGEEDITFORM){

            // 'required|email|unique:users,email Rule::unique("users", "email")->ignore($this->editUser['id'])
            return [
                'editUser.nom' => 'required',
                'editUser.prenom' => 'required',
                'editUser.email' => ['required', 'email', Rule::unique("users", "email")->ignore($this->editUser['id']) ] ,
                'editUser.telephone1' => ['required', 'numeric', Rule::unique("users", "telephone1")->ignore($this->editUser['id']) ]  ,
                'editUser.pieceIdentite' => ['required'],
                'editUser.sexe' => 'required',
                'editUser.numeroPieceIdentite' => ['required','numeric', Rule::unique("users", "pieceIdentite")->ignore($this->editUser['id']) ],
             //   'editUser.password' => 'required|string|min:8',
            ];
        }

        return [
            'newUser.nom' => 'required',
            'newUser.prenom' => 'required',
            'newUser.email' => 'required|email|unique:users,email',
            'newUser.telephone1' => 'required|numeric|unique:users,telephone1',
            'newUser.pieceIdentite' => 'required',
            'newUser.sexe' => 'required',
            'newUser.numeroPieceIdentite' => 'required|numeric|unique:users,numeroPieceIdentite',
            'newUser.password' => 'required|string|min:8',
            "image" => "image|max:10240"
        ];
    }

    protected $messages = ['newUser.nom.required' => "Le nom de l'utilisateur est vide.",
                           'newUser.prenom.required' => "Le prenom de l'utilisateur est vide.",
                           'newUser.email.required' => "L'email de l'utilisateur est vide.",
                           'newUser.telephone1.required' => "Le numero de telephone est vide.",
                           'newUser.pieceIdentite.required' => "Le piece d'identité est vide.",
                           'newUser.sexe.required' => "Le sexe est vide.",
                           'newUser.numeroPieceIdentite.required' => "Le numero de piece d'identité est vide.",
                           
                     ];

    public function render()
    {
        Carbon::setLocale("fr");
        $searchCriteria = "%".$this->search."%";
        
        $data = [
            "users" => User::where("nom", "like", $searchCriteria)
            ->OrWhere("prenom", "like", $searchCriteria)
            ->OrWhere("email", "like", $searchCriteria)
            ->orderBy($this->sortColumn, $this->sortDirection)
            ->latest()->paginate($this->perPage),
                  /*    ->OrWhere("prenom", "like", $searchCriteria)->latest()
                      ->orderBy($this->sortColumn, $this->sortDirection)
                      ->paginate($this->perPage),*/
        ];
        return view('livewire.utilisateurs.index',$data)
        ->extends("layouts.principal")
        ->section("contenu");
    }

    public function goToAddUser(){
        sleep(2);
        $this->currentPage = PAGECREATEFORM;
    }
    public function goToListUser(){
        $this->currentPage = PAGELIST;
        $this->editUser = [];
    }
    public function goToGrille(){
        $this->currentPage = PAGEGRILLE;
    }

    //partie ajouter
    public function addUser(){
        sleep(2);
        // Vérifier que les informations envoyées par le formulaire sont correctes
       $this->validate([
            'newUser.nom' => 'required',
            'newUser.prenom' => 'required',
            'newUser.email' => 'required|email|unique:users,email',
            'newUser.telephone1' => 'required|numeric|unique:users,telephone1',
            'newUser.pieceIdentite' => 'required',
            'newUser.sexe' => 'required',
            'newUser.numeroPieceIdentite' => 'required|numeric|unique:users,numeroPieceIdentite',
            'newUser.password' => 'required|string|min:8',
            "image" => "image|max:10240"
       ]);
       $path="";
       if($this->image){
        $path=$this->image->store('files', 'public');
        $imagePath = "storage/".$path;
      }
    //   $validationAttributes["newUser"]["password"] = "password";
      // dump($validationAttributes);
     // Ajouter un nouvel utilisateur
       User::create([
       "nom" => $this->newUser["nom"],
       "prenom" => $this->newUser["prenom"],
       "sexe" => $this->newUser["sexe"],
       "telephone1" => $this->newUser["telephone1"],
       "pieceIdentite" => $this->newUser["pieceIdentite"],
       "numeroPieceIdentite" => $this->newUser["numeroPieceIdentite"],
       "email" => $this->newUser["email"],
       "password" =>Hash::make($this->newUser["password"]),
       "photo" => $imagePath
       ]);
       //reinitialiser le formulaire
       $this->notify();
       $this->newUser = [];
       $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Utilisateur créé avec succès!"]);
       $this->resetValueInput++;
      $this->image=null;
    }

//partie de suppression
public function confirmDelete($name, $id){
    $this->dispatchBrowserEvent("showConfirmMessage", ["message"=> [
        "text" => "Vous êtes sur le point de supprimer $name de la liste des utilisateurs. Voulez-vous continuer?",
        "title" => "Êtes-vous sûr de continuer?",
        "type" => "warning",
        "data" => [ "user_id" => $id]
    ]]);
}  

public function deleteUser($id){
    User::destroy($id);

    $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Utilisateur supprimé avec succès!"]);
}
//partie de modifier
public function goToEditUser(User $user){
    $this->editUser = $user->toArray();
    $this->currentPage = PAGEEDITFORM;
    
   //applle fonction
   $this->populateRolePermissions();
}

public function updateUser(){
    sleep(2);
    $this->validate();
    $user = User::find($this->editUser["id"]);
    $user->fill($this->editUser);
 //   $user->fill($this->editUser[Hash::make($this->editUser["password"])]);
    if($this->editImage){
        $path = $this->editImage->store("files", "public");
        $imagePath = "storage/".$path;
        Storage::disk("local")->delete(str_replace("storage/", "public/", $user->photo));
        $user->photo = $imagePath;
    }
    $user->save();
   /* Auth::user()->update([
        'password' => Hash::make($this->password),
    ]);*/

    $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Utilisateur mis à jour avec succès!"]);
    
}
//role et permission
public function populateRolePermissions(){
    $this->rolePermissions["roles"] = [];

    $mapForCB = function($value){
        return $value["id"];
    };

    $roleIds = array_map($mapForCB, User::find($this->editUser["id"])->roles->toArray()); // [1, 2, 4]

    foreach(Role::all() as $role){
        if(in_array($role->id, $roleIds)){
            array_push($this->rolePermissions["roles"], ["role_id"=>$role->id, "role_nom"=>$role->nom, "active"=>true]);
        }else{
            array_push($this->rolePermissions["roles"], ["role_id"=>$role->id, "role_nom"=>$role->nom, "active"=>false]);
        }
    }

  // la logique pour charger les roles et les permissions
}

 public function updateRoleAndPermissions(){
        DB::table("user_role")->where("user_id", $this->editUser["id"])->delete();

        foreach($this->rolePermissions["roles"] as $role){
            if($role["active"]){
                User::find($this->editUser["id"])->roles()->attach($role["role_id"]);
            }
        }

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Roles mis à jour avec succès!"]);
    }

//reinitialisation password
public function confirmPwdReset(){
    $this->dispatchBrowserEvent("showConfirmMessage", ["message"=> [
        "text" => "Vous êtes sur le point de réinitialiser le mot de passe de cet utilisateur. Voulez-vous continuer?",
        "title" => "Êtes-vous sûr de continuer?",
        "type" => "warning"
    ]]);
}

public function resetPassword(){

    User::find($this->editUser["id"])->update(["password" => Hash::make(DEFAULTPASSOWRD)]);
    $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Mot de passe utilisateur réinitialisé avec succès!"]);
}

//
public function notify()
{
    if(auth()->user()){
        $user = User::whereId("")->first();
        /*$searchCriteria = "%".$this->search."%";
        $user = User::where("id", "like", $searchCriteria)->latest();*/
        auth()->user()->notify(new UserFollowNotification($user));
    }
   // dd("done");
}

}
