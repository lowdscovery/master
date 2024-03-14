<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Maintenance;

class Intervenant extends Model
{
    use HasFactory;
protected $table = "intervenants";
protected $fillable = [
    "nom","prenom", "service", "matricule","sexe", "telephone", "dateEmbauche", "photo",
];

public function incidents(){
    return $this->hasMany(Incident::class);
}
public function rapports(){
    return $this->hasMany(Rapport::class);
}
public function maintenances(){
    return $this->hasMany(Maintenance::class);
}

}
