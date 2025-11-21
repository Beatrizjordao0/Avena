<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GruposTerapia extends Model
{
    protected $table = 'grupos_terapia';
    protected $primaryKey = 'id_gp_terapia';
    protected $fillable = ['nome_gp','id_terapeuta','cod_gp'];

    public function terapeuta(): BelongsTo
    {
        return $this->belongsTo(Terapeuta::class, 'id_terapeuta', 'id_terapeuta');
    }

    public function membros(): HasMany
    {
        return $this->hasMany(MembrosGp::class, 'id_gp', 'id_gp_terapia');
    }
}
