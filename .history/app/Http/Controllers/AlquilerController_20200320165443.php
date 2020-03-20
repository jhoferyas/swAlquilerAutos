<?php

namespace App\Http\Controllers;

use App\Alquiler;
use App\Http\Helper\ResponseBuilder;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class AlquilerController extends BaseController{

    public function nuevocliente(Request $request){
        
        $alquiler = new Alquiler();
        $alquiler->cedula = $request->cedula;
        $alquiler->nombre = $request->nombre;
        $alquiler->Apellido = $request->Apellido;
        $alquiler->telefono = $request->telefono;
        $alquiler->direccion = $request->direccion;
        $alquiler->save();
        $info = "Agregado con Exito";
        $status = 200;
        
    
        return ResponseBuilder::result($status, $info, $cliente);
    
        
      }
    

}