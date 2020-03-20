<?php

namespace App\Http\Controllers;

use App\Alquiler, Vehiculo, Cliente;
use App\Http\Helper\ResponseBuilder;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class AlquilerController extends BaseController{

    public function nuevoAlquiler(Request $request){
        $vehiculo = Vehiculo::where('vehiculo_id',$request -> placa_vehiculo);
        $cliente = Cliente::wherw('clienete_id',$request -> nombre);
        $alquiler = new Alquiler();
        $alquiler->nombre = $request->nombre;
        $alquiler->placa_vehiculo = $request->placa_vehiculo;
        $alquiler->fechaInicio = $request->fechaInicio;
        $alquiler->fechaFin = $request->fechaFin;
        $alquiler->precio = $request->precio;
        $alquiler->Cliente_id = 
        $alquiler->Vehiculo_id = $vehiculo->vehiculo_id;
        $alquiler->save();
        $info = "Agregado con Exito";
        $status = 200;
    
        return ResponseBuilder::result($status, $info, $alquiler);
    
      }
    

}