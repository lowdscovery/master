<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bassin extends Model
{
    use HasFactory;

    protected $fillable = [
        "Longueur","Largeur","Hauteur","Volume","HauteurAspiration","VolumeAspiration","Total","ressource_id"
    ];
}
