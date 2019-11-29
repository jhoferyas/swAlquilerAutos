<?php

namespace App\Http\Controllers;

use App\Cuenta;
use App\Transaccion;
use App\Http\Helper\ResponseBuilder;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class TransaccionController extends BaseController
{
    public function realizartransaccion(Request $request){
       //if($request->isJson()){
        $cuenta = Cuenta::where('numero',$request -> numero) -> first();
        $transaccion = new Transaccion();
        if($cuenta != null){
            $transaccion -> fechaTransaccion = $request -> fechaTransaccion;
            $transaccion -> tipo = $request -> tipo;
            if ($transaccion -> tipo == 'deposito') {
                $valor = $request -> valor ;
                $cuenta -> saldo = $cuenta -> saldo + $valor;
                $cuenta -> save();
                $transaccion -> valor = $valor;
                $transaccion -> descripcion = $request -> descripcion;
                $transaccion -> responsable = $request -> responsable;
                $transaccion -> cuenta_id = $cuenta -> 	cuenta_id;
                $transaccion -> save();
                $status = true;
                $info = "transaction is done, Ok you are perfect";
            }else{
                $status = false;
                $info = "transaction is not done";
            }
            return ResponseBuilder::result($status, $info);
        }else{
            $status = false;
            $info = "Cuenta is null";
            return ResponseBuilder::result($status, $info);
        }

      // }else{
        return ResponseBuilder::result($status, $info, $transaccion);

       //}
      
    }
}