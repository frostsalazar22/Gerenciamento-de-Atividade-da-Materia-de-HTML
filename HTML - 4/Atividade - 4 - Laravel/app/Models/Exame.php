<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exame extends Model
{
    use HasFactory;
    protected $fillable = ['paciente', 'exame_id', 'tipo_exame', 'data_coleta', 'laudo'];

}