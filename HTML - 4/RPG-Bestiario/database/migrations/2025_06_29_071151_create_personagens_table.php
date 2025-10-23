<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonagensTable extends Migration
{
    public function up()
    {
        Schema::create('personagens', function (Blueprint $table) {
            $table->id();

            // 1. Identificação
            $table->string('nome');
            $table->string('raca')->nullable();
            $table->string('classe')->nullable();
            $table->string('alinhamento')->nullable();
            $table->integer('idade')->nullable();
            $table->string('genero')->nullable();
            $table->string('altura')->nullable();
            $table->string('peso')->nullable();
            $table->text('aparencia')->nullable();

            // 2. Atributos
            $table->integer('forca')->nullable();
            $table->integer('destreza')->nullable();
            $table->integer('constituicao')->nullable();
            $table->integer('inteligencia')->nullable();
            $table->integer('sabedoria')->nullable();
            $table->integer('carisma')->nullable();
            $table->integer('pontos_vida_max')->nullable();
            $table->integer('pontos_vida_atual')->nullable();
            $table->integer('classe_armadura')->nullable();
            $table->integer('iniciativa')->nullable();
            $table->string('velocidade')->nullable();

            // 3. Habilidades e Poderes (usando json para arrays/detalhes)
            $table->json('habilidades_passivas')->nullable();
            $table->json('habilidades_ativas')->nullable();
            $table->json('magias_conhecidas')->nullable();
            $table->json('slots_magia')->nullable();
            $table->json('magias_preparadas')->nullable();
            $table->json('talentos_proficiências')->nullable();

            // 4. Inventário
            $table->json('equipamentos_basicos')->nullable();
            $table->json('itens_utilizaveis')->nullable();
            $table->json('recursos')->nullable();

            // 5. Personalidade
            $table->text('motivacoes')->nullable();
            $table->text('medos_fraquezas')->nullable();
            $table->text('traços_personalidade')->nullable();
            $table->text('ideais')->nullable();
            $table->text('vinculos')->nullable();
            $table->text('defeitos')->nullable();

            // 6. História
            $table->text('background')->nullable();
            $table->text('eventos_marcantes')->nullable();
            $table->text('conexoes')->nullable();
            $table->text('segredos')->nullable();

            // 7. Estatísticas de Combate
            $table->json('ataques_magias')->nullable();
            $table->json('resistencias')->nullable();
            $table->json('fraquezas')->nullable();
            $table->json('testes_resistencia')->nullable();

            // 8. Notas Adicionais
            $table->text('frases_efeito')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('personagens');
    }
}
