<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rapport extends Model
{
    use HasFactory;

    protected $fillable = [
        'dateDebut','dateFin','intervenant_id','lieu','motif','rapport',
    ];

    public function inters(){
        return $this->belongsTo(Intervenant::class,'intervenant_id','id');
    }
}
