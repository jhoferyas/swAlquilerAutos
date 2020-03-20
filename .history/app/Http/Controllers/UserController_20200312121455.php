<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Helper\ResponseBuilder;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Hashing\BcryptHasher;

class UserController extends BaseController
{
    public function login(Request $request) {
        $username = $request->username;
        $password = $request->password;

        $user = User::where('username', $username)->first();
        if ($user) {
            $status = true;
            $info = "Usuario valido";

            if ($this->django_password_verify($password, $user->password)) {
                $status = true;
                $info = "¡¡Has Inisiado Sesion!!";
                return ResponseBuilder::result($status, $info,$user);
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

    public function django_password_verify(string $password, string $djangoHash): bool{
        $pieces = explode('$', $djangoHash);
        if (count($pieces) !== 4){
            throw new Exception("Ilegal Hash format");
        }
        list($header, $iter, $salt, $hash) = $pieces;
        //Get the hash algotithm used:
        if (preg_match('#^pbkdf2_([a-z0-9A-Z]+)$#', $header, $m)){
            $algo = $m[1];
        }else{
            throw new Exception(sprintf("Bad header (%s)", $header));
        }

        if (!in_array($algo, hash_algos())){
            throw new Exception(sprintf("Ilegal hash algotihm (%s)", $algo));
        }

        //Has_pbkdf2 = gnera uan derivacion de clave PBKDF2 de una contrasenia proporcionaa
        //algo = es el nombre del algoritmo hash seleccionado
        //salt = es una valor para la derivacion, este valor deberia ser generado aleatoriamente
        $calc = hash_pbkdf2(
            $algo,
            $password,
            $salt,
            (int) $iter,
            32,
            true
        );
        return hash_equals($calc, base64_decode($hash));

    }

    public function logout(Request $request){

    }

}



