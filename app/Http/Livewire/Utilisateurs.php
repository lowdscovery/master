<?php

namespace App\Http\Livewire;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Utilisateurs extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    //public $isBtnAddClicked=false;
    public $newUser = [];
    public $editUser = [];
    public $currentPage = PAGELIST;
    public $rolePermissions = [];
    public $search = "";

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
                'editUser.numeroPieceIdentite' => ['required', Rule::unique("users", "pieceIdentite")->ignore($this->editUser['id']) ],
            ];
        }

        return [
            'newUser.nom' => 'required',
            'newUser.prenom' => 'required',
            'newUser.email' => 'required|email|unique:users,email',
            'newUser.telephone1' => 'required|numeric|unique:users,telephone1',
            'newUser.pieceIdentite' => 'required',
            'newUser.sexe' => 'required',
            'newUser.numeroPieceIdentite' => 'required|unique:users,numeroPieceIdentite',
        ];
    }

    protected $messages = ['newUser.nom.required' => "Le nom de l'utilisateur est requis.", ];

    public function render()
    {
        Carbon::setLocale("fr");
        $searchCriteria = "%".$this->search."%";
        
        $data = [
            "users" => User::where("nom", "like", $searchCriteria)->latest()->paginate(5),
        ];
        return view('livewire.utilisateurs.index',$data)
        ->extends("layouts.principal")
        ->section("contenu");
    }

    public function goToAddUser(){
        $this->currentPage = PAGECREATEFORM;
    }
    public function goToListUser(){
        $this->currentPage = PAGELIST;
        $this->editUser = [];
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
        "data" => [ "user_id" => $id]
    ]]);
}  

public function deleteUser($id){
    User::destroy($id);

    $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Utilisateur supprimé avec succès!"]);
}
//partie de modifier
public function goToEditUser($id){
    $this->editUser = User::find($id)->toArray();
    $this->currentPage = PAGEEDITFORM;
    
   //applle fonction
   $this->populateRolePermissions();
}

public function updateUser(){
    // Vérifier que les informations envoyées par le formulaire sont correctes
    $validationAttributes = $this->validate();
    User::find($this->editUser["id"])->update($validationAttributes["editUser"]);
    $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Utilisateur mis à jour avec succès!"]);
}
//role et permission
public function populateRolePermissions(){
    $this->rolePermissions["roles"] = [];
    $this->rolePermissions["permissions"] = [];

    $mapForCB = function($value){
        return $value["id"];
    };

    $roleIds = array_map($mapForCB, User::find($this->editUser["id"])->roles->toArray()); // [1, 2, 4]
    $permissionIds = array_map($mapForCB, User::find($this->editUser["id"])->permissions->toArray()); // [1, 2, 4]

    foreach(Role::all() as $role){
        if(in_array($role->id, $roleIds)){
            array_push($this->rolePermissions["roles"], ["role_id"=>$role->id, "role_nom"=>$role->nom, "active"=>true]);
        }else{
            array_push($this->rolePermissions["roles"], ["role_id"=>$role->id, "role_nom"=>$role->nom, "active"=>false]);
        }
    }

    foreach(Permission::all() as $permission){
        if(in_array($permission->id, $permissionIds)){
            array_push($this->rolePermissions["permissions"], ["permission_id"=>$permission->id, "permission_nom"=>$permission->nom, "active"=>true]);
        }else{
            array_push($this->rolePermissions["permissions"], ["permission_id"=>$permission->id, "permission_nom"=>$permission->nom, "active"=>false]);
        }
    }
  // la logique pour charger les roles et les permissions
}

 public function updateRoleAndPermissions(){
        DB::table("user_role")->where("user_id", $this->editUser["id"])->delete();
        DB::table("user_permission")->where("user_id", $this->editUser["id"])->delete();

        foreach($this->rolePermissions["roles"] as $role){
            if($role["active"]){
                User::find($this->editUser["id"])->roles()->attach($role["role_id"]);
            }
        }

        foreach($this->rolePermissions["permissions"] as $permission){
            if($permission["active"]){
                User::find($this->editUser["id"])->permissions()->attach($permission["permission_id"]);
            }
        }

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Roles et permissions mis à jour avec succès!"]);
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
}
