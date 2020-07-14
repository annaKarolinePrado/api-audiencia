<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoResponsavel extends Model
{
    protected $fillable=[
        'id',
        'descricao'
    ];
    protected $table = 'tipoResponsavel';
}