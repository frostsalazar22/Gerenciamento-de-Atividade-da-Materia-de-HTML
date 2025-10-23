<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magia extends Model
{
    protected $table = 'magias';
    protected $fillable = [
    'nome', 'escola', 'nivel', 'classe_usuario', 'verbais', 'somaticos',
    'materiais', 'area_efeito', 'duracao', 'descricao', 'dano_beneficio',
    'alvo', 'ritual', 'resistencia', 'interrupcoes', 'aprimoramento',
    'custo_conjuracao', 'falhas_criticas', 'contraindicacoes', 'variacoes_regionais'
];

}
