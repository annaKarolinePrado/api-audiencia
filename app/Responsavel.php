<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responsavel extends Model
{   
    protected $fillable=[
        'id',
        'nome',
        'cpf',
        'rg',
        'tipo_responsavel',
        'cargo',
        'email',
        'telefone'    
    ];
    protected $table = 'responsavel';
}
