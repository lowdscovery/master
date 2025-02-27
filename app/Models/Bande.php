<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bande extends Model
{
    use HasFactory;

    protected $fillable = [
      'Date','Moteur','Pompe','U1','U2','U3','MoyenU','I1','I2','I3','MoyenI','Puissance','Debit','Pression',
    ];
}
