<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        "dateCommande","motif","article","reference","quantiteCommande","numeroDA","Situation",
        "quantiteReception","dateReception","observation","type","caracteristique",
    ];
}
