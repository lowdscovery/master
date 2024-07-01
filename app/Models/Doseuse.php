<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doseuse extends Model
{
    use HasFactory;

    protected $fillable = [
        'marque','type','numeroSerie','numeroFabrication','vitesse','encombrement',
        'anneeFabrication','fournisseur','dateAcquisition','dateMiseEnService',
        'roulement','misesEnServices','observations',
        'pressionMaxAspiration','pressionMaxRefoulement','hauteurAspirationMax','cadence',
        'rapportReduction','course','ballonAmortisseur','ballonAmortisseurRefoulement',
        'corpsDoseur','membrane','arbre','calpetAspiration','calpetRefoulement',
        'tarage','debitMax','caracteristique_moteur_id',
        'longueur','largeur','masse','hauteur',
    ];
    public function caracteristiques(){
        return $this->belongsTo(CaracteristiqueMoteur::class, "caracteristique_moteur_id","id");
    }
}
