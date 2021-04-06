<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    protected $fillable = [
        "nombre","email","sexo","area_id","boletin","descripcion",
    ];
}

class EmpleadoRol extends Model
{
    protected $table = "empleado_rol";
    protected $fillable = [
        "rol"
    ];
}
