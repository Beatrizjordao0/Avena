<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Campos permitidos para inserção/atualização em massa
     */
    protected $fillable = [
    'name',
    'sobrenome',
    'cpf',
    'data_nascimento',
    'email',
    'password',
    'file_foto_perfil',
    'tipo_conta',
];


    /**
     * Campos ocultos ao serializar o model
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casts automáticos
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'data_nascimento' => 'date',
        'password' => 'hashed', // Laravel 10+ - hash automático
    ];

    /**
     * Relação 1:1 → Um usuário pode ser um Terapeuta
     */
    public function terapeuta()
    {
        return $this->hasOne(Terapeuta::class, 'user_id', 'id');
    }

    /**
     * Relação 1:N → O usuário (paciente) participa de vários grupos
     */
    public function gruposComoPaciente()
    {
        return $this->hasMany(MembrosGp::class, 'id_paciente', 'id');
    }

    /**
     * Relação 1:N → O paciente tem várias agendas cadastradas
     */
    public function agendas()
    {
        return $this->hasMany(Agenda::class, 'id_paciente', 'id');
    }
}
