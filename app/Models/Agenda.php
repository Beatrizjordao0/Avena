<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Agenda extends Model
{
    protected $table = 'agenda';
    protected $primaryKey = 'id_agenda';
    protected $fillable = ['id_gp','id_paciente','id_atividade','dia_semana','data','hora','alarme','concluida'];

    public function grupo(): BelongsTo
    {
        return $this->belongsTo(GruposTerapia::class, 'id_gp', 'id_gp_terapia');
    }

    public function paciente(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_paciente', 'id');
    }

    public function atividade(): BelongsTo
    {
        return $this->belongsTo(LibAtividade::class, 'id_atividade', 'id_atividade');
    }
}
