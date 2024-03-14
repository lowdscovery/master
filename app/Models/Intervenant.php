<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
