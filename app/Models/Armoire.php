<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Armoire extends Model
{
    use HasFactory;

    protected $fillable = [
    'repere','designation','marque','type','reglage','datePose','photodevant','photoderriere',
    ];
}
