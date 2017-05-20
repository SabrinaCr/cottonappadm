<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    protected $table = 'administradores';
    protected $fillable = ['nome', 'login', 'senha', 'email'];
    public $timestamps = true;
}
