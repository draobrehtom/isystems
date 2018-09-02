<?php

namespace App\Service;

class Client {

    public function __construct(string $url, string $login, string $password)
    {
        if (empty($login) or empty($password)) {
            print_r('Please, enter login and password in app.php');
            exit();
        }

        $this->request = new Request($url, $login, $password);
    }

    public function producers()
    {
        return new \App\Models\Producer($this->request);
    }
}