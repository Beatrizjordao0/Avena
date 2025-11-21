<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTerapeutaTable extends Migration
{
    public function up()
    {
        Schema::create('terapeuta', function (Blueprint $table) {
            $table->id('id_terapeuta'); // increments
            $table->foreignId('user_id')->unique()->constrained('users')->onDelete('cascade'); 
            // unique porque um usuário pode ser um terapeuta uma vez (especialização)
            $table->string('file_doc_prof')->nullable();
            $table->string('file_rg')->nullable();
            $table->timestamps(); // create_time/update_time equivalentes
        });
    }

    public function down()
    {
        Schema::dropIfExists('terapeuta');
    }
}
