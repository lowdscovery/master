<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ressource;

class Bass extends Model
{
    use HasFactory;
    protected $table ="bass";
    protected $fillable = ['nom','ressource_id'];

    public function ressources(){
        return $this->belongsTo(Ressource::class, 'ressource_id','id');
    }
    public function caract(){
        return $this->hasMany(CaracteristiqueMoteur::class);
    }
}
