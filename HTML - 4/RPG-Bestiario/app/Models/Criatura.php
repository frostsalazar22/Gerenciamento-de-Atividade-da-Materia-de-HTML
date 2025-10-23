<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Criatura extends Model
{
    protected $table = 'criaturas';
    protected $fillable = [
        'nome', 'tipo', 'alinhamento', 'nivel_cd',
        'tamanho', 'velocidade', 'aparencia', 'localizacao_preferida',
        'forca', 'destreza', 'constituicao', 'inteligencia', 'sabedoria', 'carisma',
        'pontos_vida', 'classe_armadura', 'ataques', 'habilidades_passivas', 'habilidades_ativas', 'magias_conhecidas',
        'resistencias', 'imunidades', 'vulnerabilidades',
        'origem', 'motivacoes', 'misterios', 'habito_social', 'interacoes_ambiente',
        'itens', 'tesouro', 'conhecimento'
    ];

    protected $casts = [
        'ataques' => 'array',
        'habilidades_passivas' => 'array',
        'habilidades_ativas' => 'array',
        'magias_conhecidas' => 'array',
        'resistencias' => 'array',
        'imunidades' => 'array',
        'vulnerabilidades' => 'array',
        'itens' => 'array',
    ];
}
