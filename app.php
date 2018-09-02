<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Client;
use App\Parameter;

$url = 'http://grzegorz.demos.i-sklep.pl/rest_api';
$login = 'rest';
$password = 'vKTUeyrt';

// Client
$client = new \App\Service\Client($url, $login, $password);

// First method
$r = $client->producers()->create(new \App\Service\Parameter([
    'name' => 'Apple',
    'site_url' => 'apple.com',
    'logo_filename' => 'apple.png'
]));

// Second method
$r = $client->producers()->read();

print_r($r);