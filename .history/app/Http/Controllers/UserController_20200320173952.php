<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Http\Helper\ResponseBuilder;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Hashing\BcryptHasher;

class UserController extends BaseController
{
    public function login(Request $request) {
        $nombre = $request->nombre;
        $cedula = $request->cedula;

        $cliente = Cliente::where('nombre', $nombre)->first();
        if ($cliente) {
            $status = true;
            $info = "Usuario valido";

            if ($cedula == $cliente->cedula) {
                $status = true;
                $info = "¡¡Has Inisiado Sesion!!";
                return ResponseBuilder::result($status, $info,$cliente);
            } else {
                $status = false;
                $info = "Usuario incorrecto!!";
                return ResponseBuilder::result($status, $info);
            }

            return ResponseBuilder::result($status, $info);
        } else {
            $status = false;
            $info = "Usuario no existe!!";
            return ResponseBuilder::result($status, $info);
        }
        return ResponseBuilder::result($status, $info);
    }

    

    public function logout(Request $request){

    }

}



