<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    protected $table = 'equipamentos';
    protected $fillable = [
    'nome', 'categoria', 'tipo_uso', 'classe_necessaria', 'requisitos', 'peso',
    'local_origem', 'bonus', 'habilidades_passivas', 'habilidades_ativas',
    'durabilidade', 'afinidade_elemental', 'encantamentos', 'historia',
    'curiosidades', 'conexoes', 'preco', 'raridade', 'restricao_uso', 'evolucoes'
];

}
