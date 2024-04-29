<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forage extends Model
{
    use HasFactory;
    protected $fillable = ['id','nom','ressource_id'];
    
    public function caract(){
        return $this->hasMany(CaracteristiqueMoteur::class);
    }

    public function ressources(){
        return $this->belongsTo(Ressource::class, "ressource_id","id");
    }
}
