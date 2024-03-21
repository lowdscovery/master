<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bande extends Model
{
    use HasFactory;

    protected $fillable = [
      'U1','U2','U3','I1','I2','I3','Puissance','Debit','Pression',
    ];
}
