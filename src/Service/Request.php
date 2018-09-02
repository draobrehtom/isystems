<?php

namespace App\Service;

class Request {

    public function __construct(string $url, string $login, string $password)
    {
        $this->url = $url;
        $this->token = base64_encode("$login:$password");
    }

    private function request(string $type, string $endpoint, string $json = ''): array
    {
        $header = [
            'Authorization: Basic '. $this->token,
            'Content-Type: application/x-www-form-urlencoded'
        ];
        
        $options = [
            'http' => [
                'header'  => implode(PHP_EOL, $header),
                'method'  => strtoupper($type),
                'content' => $json,
                'ignore_errors' => TRUE
            ]
        ];

        $context  = stream_context_create($options);
        $result = file_get_contents($this->url . $endpoint, false, $context);        
        $result = json_decode($result);
        
        return (array) $result;
    }

    public function post(string $endpoint, string $json): array
    {
        return $this->request('post', $endpoint, $json);
    }

    public function put(string $endpoint, $data)
    {
        return $this->request('put', $endpoint, $data);
    }

    public function delete(string $endpoint)
    {
        return $this->request('delete', $endpoint);
    }

    public function get(string $endpoint): array
    {
        return $this->request('get', $endpoint);
    }
}