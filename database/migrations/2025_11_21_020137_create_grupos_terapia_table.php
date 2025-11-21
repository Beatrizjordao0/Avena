<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGruposTerapiaTable extends Migration
{
    public function up()
    {
        Schema::create('grupos_terapia', function (Blueprint $table) {
            $table->id('id_gp_terapia');
            $table->string('nome_gp');
            $table->foreignId('id_terapeuta')->constrained('terapeuta','id_terapeuta')->onDelete('cascade');
            $table->string('cod_gp', 50)->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('grupos_terapia');
    }
}
