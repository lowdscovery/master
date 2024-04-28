<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CaracteristiqueMoteur;

class Ressource extends Model
{
    use HasFactory;

    protected $fillable = ['id','nom','site_id'];
    
    public function caract(){
        return $this->hasMany(CaracteristiqueMoteur::class);
    }

    public function ouvrage(){
        $this->hasMany(Ouvrage::class);
    }
}
