<?php

namespace App\Models;

use App\Service\Parameter;


class Producer implements Model {

    public const ENDPOINT = '/shop_api/v1/producers';
    
    public function __construct(\App\Service\Request $request)
    {
        $this->request = $request;
    }

    public function create(Parameter $parameter): array
    {
        $parameter->validate([
            'name' => 'string',
            'site_url' => 'string',
            'logo_filename' => 'string',
        ]);
        
        return $this->request->post(self::ENDPOINT, $parameter->__toJson('producer'));
    }

    public  function read(Parameter $parameter = null): array
    {
        // by id example:
        // $this->request->get(self::ENDPOINT . '/' . $parameter->id);
        
        return $this->request->get(self::ENDPOINT);
    }

    public  function update(Parameter $parameter): array
    {
        // TODO: Implement update() method.

        return [];
    }

    public  function delete(Parameter $parameter): array
    {
        // TODO: Implement delete() method.

        return [];
    }
}