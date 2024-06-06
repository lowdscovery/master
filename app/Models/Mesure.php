<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesure extends Model
{
    use HasFactory;

    protected $fillable = [
        'Date','IndexCH','H','U1','U2','U3','I1','I2','I3','Puissance','Cos','Ph1_PH2','Ph1_PH3',
        'Ph2_PH3','Ph1_m','Ph2_m','Ph3_m','X1_X2','Y1_Y2','Z1_Z2','Debit','Vacuo','Mano','ND','NS',
        'Rab','Cs','Conspé','Agent',
    ];
}
