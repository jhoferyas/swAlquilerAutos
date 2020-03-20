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
          'nombre', 'placa_vehiculo', 'fechaInicio', 'fechaFin', 'Cliente_id','Vehiculo_id',
    ];


    public $timestamps = false;

}