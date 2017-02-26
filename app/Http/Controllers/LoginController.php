<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Command;

class LoginController extends Controller
{

    public function autenticar(Request $request){
    
        //Crea un usuario para poder manejarlo libremente
        $usuario = new Usuario(
                $request->input('user', 'XXXXXXXX'),
                $request->input('password', '12345678'),
                $request->input('uip', 'XXX.X.X.X'),
                $request->input('client_mac', 'XX.XX.XX.XX.XX.XX')
            );

        //Crea nuevo comando a partir de el usuario
        $command = new Command($usuario, "UserOnlineControl", "LoginAsync");

        $command->send();
    }

}
