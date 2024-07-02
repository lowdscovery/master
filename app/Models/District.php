<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CaracteristiqueMoteur;

class District extends Model
{
    use HasFactory;

    protected $fillable = ['id','nom',];
    
    public function site(){
        return $this->hasMany(Site::class);
    }
    public function caract(){
        return $this->hasMany(CaracteristiqueMoteur::class);
    }
}
