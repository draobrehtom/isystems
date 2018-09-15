<?php

namespace App\Service;

class Client {

    private $url;
    private $login;
    private $password;

    public function __construct(string $url, string $login, string $password, Request $requester)
    {
        $this->url = $url;
        $this->login = $login;
        $this->password = $password;



        $this->requester = $requester;
    }

    private function validate()
    {
        if (empty($this->login) or empty($this->password)) {

            
            print_r('Please, enter login and password in app.php');
            exit();
        }
    }

    private function getRequest(): Request
    {
        return $this->requester->auth($this->url, $this->login, $this->password);
    }

    public function producers()
    {
        return new \App\Models\Producer($this->getRequest());
    }
}