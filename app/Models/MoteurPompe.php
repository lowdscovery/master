<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoteurPompe extends Model
{
    use HasFactory;

    protected $fillable = [
        'debitNominal','hauteurManometrique',
        'corpsDePompe','chemiseArbre','caracteristique_moteur_id',
    ];

    public function caracteristiques(){
        return $this->belongsTo(CaracteristiqueMoteur::class, "caracteristique_moteur_id","id");
    }
}
