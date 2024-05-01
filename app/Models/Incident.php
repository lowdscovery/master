<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    use HasFactory;

    protected $fillable = [
        "dateIncident","indexCH","heure","natureIncident",
        "cause","action","resultat","intervenant_id","caracteristique_moteur_id",
    ];

    public function intervenants(){
        return $this->hasMany(Intervenant::class,"modelsintervenant_id","id");
    }
}
