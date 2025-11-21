<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LibAtividade extends Model
{
    protected $table = 'lib_atividade';
    protected $primaryKey = 'id_atividade';
    protected $fillable = ['id_terapeuta','nome_atv','desc_atv','lib_atividadecol'];

    public function terapeuta(): BelongsTo
    {
        return $this->belongsTo(Terapeuta::class, 'id_terapeuta', 'id_terapeuta');
    }
}
