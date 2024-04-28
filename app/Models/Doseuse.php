<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doseuse extends Model
{
    use HasFactory;

    protected $fillable = [
        'pressionMaxAspiration','pressionMaxRefoulement','hauteurAspirationMax','cadence',
        'rapportReduction','course','ballonAmortisseur','ballonAmortisseurRefoulement',
        'corpsDoseur','membrane','arbre','calpetAspiration','calpetRefoulement',
        'tarage','debitMax','caracteristique_moteur_id',
    ];
}
