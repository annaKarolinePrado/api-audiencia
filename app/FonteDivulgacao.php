<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FonteDivulgacao extends Model
{
    protected $fillable=[
        'id',
        'nome',
        'fonteDivulgacao'
    ];
    protected $table = 'fonte_divulgacao';
}
