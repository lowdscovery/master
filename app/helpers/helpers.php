<?php
use Illuminate\Support\Str;


define("PAGELIST", "liste");
define("PAGECREATEFORM", "create");
define("PAGEEDITFORM", "edit");
define("DEFAULTPASSOWRD", "password");
define("PAGEADDFORM", "add");
define("PAGELISTFORM", "liste");
define("INFORMATION", "information");
define("UPDATEINTERVENANT", "update");
define("CARDINTERVENANT","card");
define("LISTINTERVENANT", "intervenant");
define("PAGEGRILLE", "grille");
define("AFFICHAGE", "affichage");
define("AFFICHAGEBASSIN", "affichagebassin");
define("OUVRAGE","show");
define("DETAILLEOUVRAGE","detaille");
define("DETAILLEMAINTENANCE","detaille");

/*Affiche le nom et prenom*/
function userFullName(){
 return auth()->user()->nom." ".auth()->user()->prenom;
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
/*pour gerer la fonction de menu open et active*/
function setMenuClass($route, $classe){
    $routeActuel = request()->route()->getName();

    if(contains($routeActuel, $route) ){
        return $classe;
    }
    return "";
}

function setMenuActive($route){
    $routeActuel = request()->route()->getName();

    if($routeActuel === $route ){
        return "active";
    }
    return "";
}

function contains($container, $contenu){
    return Str::contains($container, $contenu);
}