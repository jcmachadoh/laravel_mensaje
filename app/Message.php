<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //protected $table = 'nombre_de_la_tabla;

    protected $fillable = ['nombre', 'email', 'message'];
}
