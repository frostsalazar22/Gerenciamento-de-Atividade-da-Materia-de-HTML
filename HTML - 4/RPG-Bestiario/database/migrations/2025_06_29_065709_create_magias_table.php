<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('magias', function (Blueprint $table) {
            $table->id();
            $table->string('nome'); // Nome da Magia
            $table->string('escola'); // Ex.: Evocação, Necromancia
            $table->integer('nivel'); // Ex.: Magia de 3º nível
            $table->string('classe_usuario'); // Ex.: Magos, Clérigos
            $table->boolean('verbais')->default(false); // Se requer palavras mágicas
            $table->boolean('somaticos')->default(false); // Se requer gestos
            $table->json('materiais')->nullable(); // Lista de itens necessários
            $table->string('area_efeito')->nullable(); // Ex.: 20 metros de raio
            $table->string('duracao')->nullable(); // Ex.: Instantâneo, 1 minuto
            $table->text('descricao'); // O que a magia faz
            $table->string('dano_beneficio')->nullable(); // Ex.: 6d6 de dano
            $table->string('alvo')->nullable(); // Ex.: Uma criatura
            $table->boolean('ritual')->default(false); // Se pode ser lançado como ritual
            $table->json('resistencia')->nullable(); // Ex.: {"tipo": "Sabedoria", "cd": 15}
            $table->string('interrupcoes')->nullable(); // Ex.: Falha com distração
            $table->text('aprimoramento')->nullable(); // Efeitos adicionais ao usar níveis superiores
            $table->string('custo_conjuracao')->nullable(); // Ex.: Sacrifício de PV
            $table->text('falhas_criticas')->nullable(); // O que acontece ao falhar
            $table->text('contraindicacoes')->nullable(); // Ex.: Afeta aliados
            $table->text('variacoes_regionais')->nullable(); // Alterações baseadas no local
            $table->timestamps();
        });
    }


        /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('magias');
    }
};
