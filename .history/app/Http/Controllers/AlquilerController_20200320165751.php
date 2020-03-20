<?php

namespace App\Http\Controllers;

use App\Alquiler;
use App\Http\Helper\ResponseBuilder;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class AlquilerController extends BaseController{

    public function nuevocliente(Request $request){
        
        $alquiler = new Alquiler();
        $alquiler->nombre = $request->nombre;
        $alquiler->placa_vehiculo = $request->placa_vehiculo;
        $alquiler->fechaInicio = $request->fechaInicio;
        $alquiler->fechaFin = $request->fechaFin;
        $alquiler->Cliente_id = $alquiler->alquiler_id;
        $alquiler->Vehiculo_id = $alquiler->alquiler_id;
        $alquiler->save();
        $info = "Agregado con Exito";
        $status = 200;
    
        return ResponseBuilder::result($status, $info, $cliente);
    
        
      }
    

}