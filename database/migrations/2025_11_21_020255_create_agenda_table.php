<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendaTable extends Migration
{
    public function up()
    {
        Schema::create('agenda', function (Blueprint $table) {
            $table->id('id_agenda');
            $table->foreignId('id_gp')->constrained('grupos_terapia','id_gp_terapia')->onDelete('cascade');
            $table->foreignId('id_paciente')->constrained('users','id')->onDelete('cascade');
            $table->foreignId('id_atividade')->constrained('lib_atividade','id_atividade')->onDelete('cascade');
            $table->tinyInteger('dia_semana')->unsigned();
            $table->date('data');
            $table->time('hora');
            $table->boolean('alarme')->default(false);
            $table->boolean('concluida')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('agenda');
    }
}
