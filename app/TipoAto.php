<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoAto extends Model
{
    protected $fillable=[
        'id',
        'descricao',
        'classificacao'
    ];
    protected $table = 'tipo_ato';
}
