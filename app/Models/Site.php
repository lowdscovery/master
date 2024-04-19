<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CaracteristiqueMoteur;

class Site extends Model
{
    use HasFactory;
    protected $fillable = ['id','nom','district_id'];
    
    public function caract(){
        return $this->hasMany(CaracteristiqueMoteur::class);
    }
}
