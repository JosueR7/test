<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    protected $fillable = [
        "nombre","email","sexo","area_id","boletin","descripcion"
    ];
}
