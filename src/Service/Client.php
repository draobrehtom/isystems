<?php

namespace App\Service;

class Client {

    public function __construct(string $url, string $login, string $password)
    {
        $this->request = new Request($url, $login, $password);
    }

    public function producers()
    {
        return new \App\Models\Producer($this->request);
    }
}