<?php

namespace App\Service;

use \Exception;

class Parameter {

    public function __construct(array $params)
    {
        foreach ($params as $key => $value) {
            $this->{$key} = $value;
        }
    }

    public function validate(array $fields)
    {
        $vars = get_object_vars($this);

        foreach ($fields as $name => $type) {

            $exception = new Exception();

            if (! isset($vars[$name])) {
                throw new Exception("Field $name doesn't set");
            }

            $actualType = gettype($vars[$name]);
            if ($actualType != $type) {
                throw new Exception("Field $name needs to be type '$type', actual - '$actualType'");
            }
        }
    }

    public function __toJson(string $prefix = '')
    {
        $vars = get_object_vars($this);

        if (! empty($prefix)) {
            $vars = [
                $prefix => $vars
            ];
        }
        
        return json_encode($vars);
    }
}