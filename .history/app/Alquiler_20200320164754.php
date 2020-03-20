<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class Alquiler extends Model
{
    protected $table ='modelo_alquiler';
    protected $primaryKey = 'alquiler_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
          'cedula', 'nombre', 'Apellido', 'telefono', 'direccion'
    ];


    public $timestamps = false;

}