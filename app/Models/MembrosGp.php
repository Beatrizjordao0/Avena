<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MembrosGp extends Model
{
    protected $table = 'membros_gp';
    protected $primaryKey = 'membros_id';
    protected $fillable = ['id_gp','id_paciente','data_entrada','ativo_gp'];

    public function grupo()
    {
        return $this->belongsTo(GruposTerapia::class, 'id_gp', 'id_gp_terapia');
    }

    public function paciente()
    {
        return $this->belongsTo(User::class, 'id_paciente', 'id');
    }
}
