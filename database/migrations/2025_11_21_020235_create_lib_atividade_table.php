<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibAtividadeTable extends Migration
{
    public function up()
    {
        Schema::create('lib_atividade', function (Blueprint $table) {
            $table->id('id_atividade');
            $table->foreignId('id_terapeuta')
                  ->constrained('terapeuta', 'id_terapeuta')
                  ->onDelete('cascade');
            $table->string('nome_atv', 50);
            $table->string('desc_atv')->nullable();
            $table->time('horario')->nullable(); // <<-- corrigido: horário da atividade
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lib_atividade');
    }
}
