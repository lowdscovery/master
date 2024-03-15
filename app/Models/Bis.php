<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bis extends Model
{
    use HasFactory;

    protected $fillable = [
        "repere","designation","marque","type","Dn",
        "Pn","dateDePose","tarage","caracteristique",
    ];
}
