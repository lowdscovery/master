<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Intervenant;
use App\Models\CaracteristiqueMoteur;

class Maintenance extends Model
{
    use HasFactory;
    protected $table = 'maintenances';
    protected $fillable = [
        "dateMaintenance","actionEntreprise","type","intervenant_id","caracteristique_moteurs_id",
        "DureeIntervention","DureeReel","Rapport","status","read",
    ];
    public function inters(){
        return $this->belongsTo(Intervenant::class,'intervenant_id','id');
    }
    public function caracteristique(){
        return $this->belongsTo(CaracteristiqueMoteur::class,'caracteristique_moteurs_id','id');
    }
}
