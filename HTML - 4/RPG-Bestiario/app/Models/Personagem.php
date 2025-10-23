<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personagem extends Model
{
     protected $table = 'personagens'; // <--- adicione isto
    protected $fillable = [
        'nome', 'raca', 'classe', 'alinhamento', 'idade', 'genero', 'altura', 'peso', 'aparencia',
        'forca', 'destreza', 'constituicao', 'inteligencia', 'sabedoria', 'carisma',
        'pontos_vida_max', 'pontos_vida_atual', 'classe_armadura', 'iniciativa', 'velocidade',
        'habilidades_passivas', 'habilidades_ativas', 'magias_conhecidas', 'slots_magia', 'magias_preparadas', 'talentos_proficiências',
        'equipamentos_basicos', 'itens_utilizaveis', 'recursos',
        'motivacoes', 'medos_fraquezas', 'traços_personalidade', 'ideais', 'vinculos', 'defeitos',
        'background', 'eventos_marcantes', 'conexoes', 'segredos',
        'ataques_magias', 'resistencias', 'fraquezas', 'testes_resistencia',
        'frases_efeito'
    ];

    protected $casts = [
        'habilidades_passivas' => 'array',
        'habilidades_ativas' => 'array',
        'magias_conhecidas' => 'array',
        'slots_magia' => 'array',
        'magias_preparadas' => 'array',
        'talentos_proficiências' => 'array',
        'equipamentos_basicos' => 'array',
        'itens_utilizaveis' => 'array',
        'recursos' => 'array',
        'ataques_magias' => 'array',
        'resistencias' => 'array',
        'fraquezas' => 'array',
        'testes_resistencia' => 'array',
    ];
}
