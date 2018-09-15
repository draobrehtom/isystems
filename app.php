<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Service\Client;
use App\Service\Parameter;
use App\Service\Request;

$url = 'http://grzegorz.demos.i-sklep.pl/rest_api';
$login = 'rest';
$password = 'vKTUeyrt';

// Client
$client = new Client($url, $login, $password, new Request());

// First method
$r = $client->producers()->create(new Parameter([
    'name' => 'Apple',
    'site_url' => 'apple.com',
    'logo_filename' => 'apple.png'
]));

// Second method
// $r = $client->producers()->read();

print_r($r);