<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class Vehiculo extends Model
{
    protected $table ='modelo_vehiculo';
    protected $primaryKey = 'vehiculo_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
          'placa', 'modelo', 'color', 'marca','año'
    ];


    public $timestamps = false;

}