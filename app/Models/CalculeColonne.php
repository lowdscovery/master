<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalculeColonne extends Model
{
    use HasFactory;
    protected $fillable = [
        'col1', 'col2', 'col3', 'avg_col','result_col']; 
        //'input4', 'input5', 'input6', 'average_result1',
}
