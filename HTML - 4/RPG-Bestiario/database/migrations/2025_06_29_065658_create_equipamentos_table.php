<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('equipamentos', function (Blueprint $table) {
            $table->id();
            $table->string('nome'); // Nome básico do equipamento
            $table->string('categoria')->nullable();
            $table->string('tipo_uso')->nullable();
            $table->string('classe_necessaria')->nullable();
            $table->json('requisitos')->nullable();
            $table->float('peso')->nullable();
            $table->string('local_origem')->nullable();
            $table->json('bonus')->nullable();
            $table->json('habilidades_passivas')->nullable();
            $table->json('habilidades_ativas')->nullable();
            $table->integer('durabilidade')->nullable();
            $table->string('afinidade_elemental')->nullable();
            $table->json('encantamentos')->nullable();
            $table->text('historia')->nullable();
            $table->text('curiosidades')->nullable();
            $table->text('conexoes')->nullable();
            $table->integer('preco')->nullable();
            $table->string('raridade')->nullable();
            $table->text('restricao_uso')->nullable();
            $table->text('evolucoes')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('equipamentos');
    }
};
