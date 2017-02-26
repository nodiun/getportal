<?php

namespace App;

class Command
{
    public $JSON;
    public $typo;
    public $category;

    function __construct($usuario, $category, $typo) {
        $this->category = $category;
        $this->typo = $typo;
        $this->createJSON($usuario);
    }

    public function send() {

        $url = env('SZ_URL', 'NO_URL');
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $this->JSON);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        $result = curl_exec($ch);

    }

    public function createJSON($usuario) {
        if($this->category == "UserOnlineControl") {
            switch ($this->typo) {
                case 'LoginAsync':
                    $this->JSON = array(
                                    'Vendor' => 'ruckus',
                                    'RequestPassword' =>  env('NBI_PASSWORD', 'NO_PASSWORD'),
                                    'APIVersion' => '1.0',
                                    'RequestCategory' => 'UserOnlineControl',
                                    'RequestType' => 'LoginAsync',
                                    'UE-IP' => $usuario->ip,
                                    'UE-MAC' => $usuario->mac,
                                    'UE-Proxy' => '0',
                                    'UE-Username' => $usuario->user,
                                    'UE-Password' => $usuario->password
                                );
                    break;
            }
        }

        $this->JSON = json_encode($this->JSON);
    }
}
