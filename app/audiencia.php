<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class audiencia extends Model
{
    protected $fillable=[
        'id',
        'tema',
        'ato',
        'dataHora',
        'dataPrimeiraConvocacao',
        'situacao',
        'equipePlanejamento',
        'enderecoDoBeneficiado',
        'tipoAudiencia',
        'enderecoBeneficiado',
        'assunto'
    ];
    protected $table = 'audiencia';
}
