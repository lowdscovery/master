<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaracteristiqueMoteur extends Model
{
    use HasFactory;

    protected $fillable=[
        'marque',
        'type',
        'numeroSerie',
        'numeroFabrication',
        'vitesse',
        'encombrement',
        'anneeFabrication',
        'fournisseur',
        'dateAcquisition',
        'dateMiseEnService',
        'roulement',
        'misesEnServices',
        'observations',
        'moteurs'
    ];
}
