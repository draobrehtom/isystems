<?php

namespace App\Exceptions;

class AuthException extends \Exception{

    public function __construct_($message)
    {
        throw new \Exception($message);
    }
}