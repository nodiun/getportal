<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{

  public function ObtenerDatos(Request $request){
    $user = $request->input('user');
    $password = $request->input('password');
    echo "El nombre de usuario es: ".$user."<br>";
    echo "La clave de usuario es: ".$password;
  }


}
