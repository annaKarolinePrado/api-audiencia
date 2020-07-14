<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NaturezaTextoJuridico extends Model
{
    protected $fillable=[
        'id',
        'descricao'
    ];
    protected $table = 'natureza_texto_juridico';
}
