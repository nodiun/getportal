<?php

namespace App;

class Usuario
{
    public $user;
    public $password;
    public $ip;
    public $mac;

    function __construct($user, $pass, $ip, $mac) {
    	$this->user = $user;
    	$this->password = $pass;
    	$this->ip = $ip;
    	$this->mac = $mac;
    }
}
