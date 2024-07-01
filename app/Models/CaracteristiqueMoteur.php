<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\District;
use App\Models\Site;
use App\Models\Ressource;
use App\Models\Forage;
use App\Models\Maintenance;
class CaracteristiqueMoteur extends Model
{
    use HasFactory;

    protected $fillable=[
        'marque','type','numeroSerie','numeroFabrication','vitesse','encombrement','anneeFabrication',
        'fournisseur','dateAcquisition','dateMiseEnService','roulement','misesEnServices','observations',
        'moteurs','district_id','site_id','ressource_id','forage_id',
    ];
    public function pompes(){
        return $this->hasMany(MoteurPompe::class);
    }
    public function moteurs(){
        return $this->hasMany(MoteurElectrique::class);
    }
    public function doseuses(){
        return $this->hasMany(Doseuse::class);
    }
    public function districts(){
        return $this->belongsTo(District::class, 'district_id','id');
    }
    public function sites(){
        return $this->belongsTo(Site::class,"site_id", "id");
    }
    public function ressources(){
        return $this->belongsTo(Ressource::class, "ressource_id", "id");
    }
    public function forages(){
        return $this->belongsTo(Forage::class, "forage_id", "id");
    }
    public function maintenances(){
        return $this->hasMany(Maintenance::class);
    }
    public function basses(){
        return $this->belongsTo(Bass::class, "forage_id", "id");
    }
    
}
