<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ouvrage extends Model
{
    use HasFactory;

    protected $fillable = [
        'annee','debitExploite','profondeur','type','photo','filePdf','ressource_id',
        'etatActuel','observation',
    ];

    public function ressource(){
        return $this->belongsTo(Ressource::class, 'ressource_id','id');
    }
}
