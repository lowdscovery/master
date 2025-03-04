<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoteurPompe extends Model
{
    use HasFactory;

    protected $fillable = [
        'marque','type','numeroSerie','numeroFabrication','vitesse',
        'anneeFabrication','fournisseur','dateAcquisition','dateMiseEnService',
        'roulement','misesEnServices','observations',
        'debitNominal','hauteurManometrique',
        'corpsDePompe','chemiseArbre','caracteristique_moteur_id',
        'longueur','largeur','masse','hauteur','ouvrage_id',
    ];

    public function caracteristiques(){
        return $this->belongsTo(CaracteristiqueMoteur::class, "caracteristique_moteur_id","id");
    }
    public function ouvrages(){
        return $this->belongsTo(ModelsOuvrage::class, "ouvrage_id","id");
    }
}
