<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCriaturasTable extends Migration
{
    public function up()
    {
        Schema::create('criaturas', function (Blueprint $table) {
            $table->id();

            // Identificação
            $table->string('nome')->unique();
            $table->string('tipo')->nullable();
            $table->string('alinhamento')->nullable();
            $table->string('nivel_cd')->nullable();

            // Características Físicas
            $table->string('tamanho')->nullable();
            $table->string('velocidade')->nullable();
            $table->text('aparencia')->nullable();
            $table->string('localizacao_preferida')->nullable();

            // Atributos
            $table->integer('forca')->nullable();
            $table->integer('destreza')->nullable();
            $table->integer('constituicao')->nullable();
            $table->integer('inteligencia')->nullable();
            $table->integer('sabedoria')->nullable();
            $table->integer('carisma')->nullable();

            // Estatísticas de Combate
            $table->string('pontos_vida')->nullable(); // pode ser texto para valores roláveis
            $table->integer('classe_armadura')->nullable();
            $table->json('ataques')->nullable(); // ex: [{"nome": "Mordida", "bonus": 5, "dano": "1d8+3 cortante"}]
            $table->json('habilidades_passivas')->nullable();
            $table->json('habilidades_ativas')->nullable();
            $table->json('magias_conhecidas')->nullable();

            // Resistências e Vulnerabilidades
            $table->json('resistencias')->nullable();
            $table->json('imunidades')->nullable();
            $table->json('vulnerabilidades')->nullable();

            // Comportamento e Lore
            $table->text('origem')->nullable();
            $table->text('motivacoes')->nullable();
            $table->text('misterios')->nullable();
            $table->string('habito_social')->nullable();
            $table->text('interacoes_ambiente')->nullable();

            // Recompensas
            $table->json('itens')->nullable();
            $table->text('tesouro')->nullable();
            $table->text('conhecimento')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('criaturas');
    }
}
