<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoteurElectrique extends Model
{
    use HasFactory;

    protected $fillable = [
       'puissance','tension','cosphi','intensite',
       'sectionCable','indiceDeProtection','classeIsolant','typeDeDemarrage','caracteristique_moteur_id',
    ];
}
