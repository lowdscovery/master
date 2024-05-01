<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesure extends Model
{
    use HasFactory;

    protected $fillable = [
        'Date','IndexCH','H','U1','U2','U3','I1','I2','I3','Puissance','Cos','Ph1/PH2','Ph1/PH3',
        'Ph2/PH3','Ph1/m','Ph2/m','Ph3/m','X1/X2','Y1/Y2','Z1/Z2','Debit','Vacuo','Mano','ND','NS',
        'Rab','Cs','Conspé','Agent',
    ];
}
