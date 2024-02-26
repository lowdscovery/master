<?php
/*Affiche le nom et prenom*/
function userFullName(){
 return auth()->user()->prenom." ".auth()->user()->nom;
}

/*fonction gerer l'authentification de l'utilisateur*/
function getRolesName(){
    $rolesName = "";
    $i = 0;
    foreach(auth()->user()->roles as $role){
        $rolesName .= $role->nom;

        //
        if($i < sizeof(auth()->user()->roles) - 1 ){
            $rolesName .= ",";
        }

        $i++;

    }

    return $rolesName;

}