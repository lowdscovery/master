<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoteurElectrique extends Model
{
    use HasFactory;

    protected $fillable = [
        'marque','type','numeroSerie','numeroFabrication','vitesse','encombrement',
        'anneeFabrication','fournisseur','dateAcquisition','dateMiseEnService',
        'roulement','misesEnServices','observations',
       'puissance','tension','cosphi','intensite',
       'sectionCable','indiceDeProtection','classeIsolant','typeDeDemarrage','caracteristique_moteur_id',
    ];
}
