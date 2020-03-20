<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Http\Helper\ResponseBuilder;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class ClienteController extends BaseController
{

  public function __construct()
  {

  }

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

//Por cedula
    public function getCliente(Request $request, $cedula){
        if($request->json()){
            //$cliente = Cliente::find($cedula);
            $cliente = Cliente::where('cedula', $cedula)->get();
            if(!$cliente->isEmpty()){
              $status = true;
              $info = "Data is listed successfully";
            }else{
              $status = false;
              $info = "Data is NOT listed successfully";
            }
            return ResponseBuilder::result($status, $info, $cliente);
        }else{
          $status = false;
          $info = "Unauthorized";
        }

          return ResponseBuilder::result($status, $info);

  }





  /*  public function guardarCliente(Request $request){
        $cliente = Cliente::insert('cedula',$request->cedula)->get();
        $cliente = new Cliente();
        if($cliente != null){
          $status = 200;
          $info = "No se que hace :cx1";
          $cliente->cedula = $request->cedula;
          $cliente->nombre = $request->nombre;
          $cliente->Apellido = $request->Apellido;
          $cliente->telefono = $request->telefono;
          $cliente->direccion = $request->direccion;
          $cliente->save();

        }else{
          $status = 200;
          $info = "No se que hace :cx2";
          $cliente = new Cliente();
          $cliente->cedula = $request->cedula;
          $cliente->nombre = $request->nombre;
          $cliente->Apellido = $request->Apellido;
          $cliente->telefono = $request->telefono;
          $cliente->direccion = $request->direccion;
          $cliente->save();
        }
        return ResponseBuilder::result($status, $info, $cliente);
        //return response()->json($cliente);

}*/



/*public function guardarCliente(Request $request){
    if($request->json()){
        $cliente = Cliente::insert('cedula',$request->cedula) ->get();

        $status = 200;
        $info = "No se que hace :cx2";
        $cliente = new Cliente();
        //$cliente->cedula = $request->cedula;
        $cliente->nombre = $request->nombre;
        $cliente->Apellido = $request->Apellido;
        $cliente->telefono = $request->telefono;
        $cliente->direccion = $request->direccion;
        $cliente->save();

      }else{
        $status = false;
        $info = "No se que hace :c";
      }


        return ResponseBuilder::result($status, $info, $cliente);


    }else{
      $status = false;
      $info = "Unauthorized";
    }

      return ResponseBuilder::result($status, $info);

    }*/







}
