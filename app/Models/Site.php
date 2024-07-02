<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CaracteristiqueMoteur;

class Site extends Model
{
    use HasFactory;
    protected $fillable = ['id','nom','district_id'];
    
    public function dist(){
        return $this->belongsTo(District::class, 'district_id','id');
    }
    public function ressources(){
        return $this->hasMany(Ressource::class);
    }
    public function caract(){
        return $this->hasMany(CaracteristiqueMoteur::class);
    }
}
