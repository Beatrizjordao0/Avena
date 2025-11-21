<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembrosGpTable extends Migration
{
    public function up()
    {
        Schema::create('membros_gp', function (Blueprint $table) {
            $table->id('membros_id');
            $table->foreignId('id_gp')->constrained('grupos_terapia','id_gp_terapia')->onDelete('cascade');
            $table->foreignId('id_paciente')->constrained('users','id')->onDelete('cascade');
            $table->date('data_entrada');
            $table->boolean('ativo_gp')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('membros_gp');
    }
}
