<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CaracteristiqueMoteur;
use App\Models\Bass;

class Ressource extends Model
{
    use HasFactory;

    protected $fillable = ['id','nom','site_id'];
    
    public function caract(){
        return $this->hasMany(CaracteristiqueMoteur::class);
    }

    public function ouvrage(){
        return $this->hasMany(Ouvrage::class);
    }

    public function bassin(){
        return $this->hasMany(Bassin::class);
    }

    public function forage(){
        return $this->hasMany(Forage::class);
    }
    public function bass(){
        return $this->hasMany(Bass::class);
    }
}
