<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{

  public function ObtenerDatos(Request $request){

    $user = $request->input('user');
    $password = $request->input('password');
    //echo "El nombre de usuario es: ".$user."<br>";
    //echo "La clave de usuario es: ".$password;

    //API Url
    $url = env('SZ_URL', 'NO_URL');

    //Initiate cURL.
    $ch = curl_init($url);

    //The JSON data.
    $jsonData = array(
        'Vendor' => 'ruckus',
        'RequestPassword' =>  env('NBI_PASSWORD', 'NO_PASSWORD'),
        'APIVersion' => '1.0',
        'RequestCategory' => 'UserOnlineControl',
        'RequestType' => 'LoginAsync',
        'UE-IP' => 'ENC12bc24c4777703327f2e0aabbf6b9f9e',
        'UE-MAC' => 'ENCCDD319C6A476FA7127DF1FB80A63CD30ADC5E47C3D',
        'UE-Proxy' => '0',
        'UE-Username' => $user,
        'UE-Password' => $password
    );

    //Encode the array into JSON.
    $jsonDataEncoded = json_encode($jsonData);

    //Tell cURL that we want to send a POST request.
    curl_setopt($ch, CURLOPT_POST, 1);

    //Attach our encoded JSON string to the POST fields.
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

    //Set the content type to application/json
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

    //Execute the request
    $result = curl_exec($ch);

    /*return Response::json($results);
    return Response()->json($Tipo);
    */

  }


}
