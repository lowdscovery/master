<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depense extends Model
{
    use HasFactory;

    protected $fillable = [
     'Date','Motif','Designation','Unite','PrixUnitaire','Quantite','Total',
    ];
}
