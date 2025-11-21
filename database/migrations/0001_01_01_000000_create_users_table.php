<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // id
            $table->string('name'); // nome
            $table->string('sobrenome'); // sobrenome
            $table->date('data_nascimento'); // data de nascimento
            $table->string('email')->unique();
            $table->string('password'); // senha
            $table->string('file_foto_perfil')->nullable(); // arquivo de perfil
            $table->enum('tipo_conta', ['P','T'])->default('P'); // tipo conta
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps(); // create_time e update_time
        });

        // outras tabelas padrão
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
