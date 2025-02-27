<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ouvrage extends Model
{
    use HasFactory;

    protected $fillable = [
        'annee','type','debitNominale','profondeur','debitConseiller','debitExploite','diametre','nombreExhaur','sondeBas','sondeHaut','photo','filePdf','ressource_id',
    ];

    public function ressource(){
        return $this->belongsTo(Ressource::class, 'ressource_id','id');
    }
    public function moteurs(){
        return $this->hasMany(MoteurElectrique::class);
    }
    public function pompes(){
        return $this->hasMany(MoteurPompe::class);
    }
}
