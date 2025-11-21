<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Terapeuta extends Model
{
    protected $table = 'terapeuta';
    protected $primaryKey = 'id_terapeuta';
    protected $fillable = ['user_id','file_doc_prof','file_rg','cpf',];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function grupos(): HasMany
    {
        return $this->hasMany(GruposTerapia::class, 'id_terapeuta', 'id_terapeuta');
    }

    public function atividades(): HasMany
    {
        return $this->hasMany(LibAtividade::class, 'id_terapeuta', 'id_terapeuta');
    }
}
