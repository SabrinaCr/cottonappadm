<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EpocaSemeadura extends Model
{
    protected $table = 'epocasemeaduras';
    protected $fillable = ['descricao'];
}
