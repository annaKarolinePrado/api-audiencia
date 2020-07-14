<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ato extends Model
{
    protected $fillable=[
        'id',
        'numero',
        'tipo',
        'naturezaTextoJuridico',
        'dataCriacao',
        'dataVigorar',
        'dataRevogar',
        'dataSancao',
        'dataPublicacao',
        'numeroDiarioOficial',
        'fonteDivulgacao',
        'ementa'
    ];
    protected $table = 'ato';
}
