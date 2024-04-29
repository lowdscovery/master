<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoteurPompe extends Model
{
    use HasFactory;

    protected $fillable = [
        'marque','type','numeroSerie','numeroFabrication','vitesse','encombrement',
        'anneeFabrication','fournisseur','dateAcquisition','dateMiseEnService',
        'roulement','misesEnServices','observations',
        'debitNominal','hauteurManometrique',
        'corpsDePompe','chemiseArbre','caracteristique_moteur_id',
    ];

    public function caracteristiques(){
        return $this->belongsTo(CaracteristiqueMoteur::class, "caracteristique_moteur_id","id");
    }
}
