<?php

namespace App\Http\Controllers;

use App\Alquiler;
use App\Http\Helper\ResponseBuilder;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class ClienteController extends BaseController{

  //todos
  public function verCliente(Request $request){
      $cliente = Cliente::all();
      if($cliente->isEmpty()){
        $status = 400;
        $info = "No hay datos en la tabla";
      }else{
        $status = 200;
        $info = "Data correcta";
      }
      return ResponseBuilder::result($status, $info, $cliente);
  }


  public function nuevocliente(Request $request){
    $cliente = Cliente::where('cedula',$request -> cedula) -> first();
    $cliente = new Cliente();
    if($cliente != null){
      $cliente->cedula = $request->cedula;
      $cliente->nombre = $request->nombre;
      $cliente->Apellido = $request->Apellido;
      $cliente->telefono = $request->telefono;
      $cliente->direccion = $request->direccion;
      $cliente->save();
      $info = "Agregado con Exito";
      $status = 200;
    }else{
        
      $info = "La Cedula ya existe en la BD";
      $status = 400;
    }

    return ResponseBuilder::result($status, $info, $cliente);

    
  }

}