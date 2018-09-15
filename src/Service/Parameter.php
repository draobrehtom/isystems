<?php

namespace App\Service;

use \Exception;

class Parameter {

    public function __construct(array $params)
    {
        $this->params = $params;
    }

    public function validate(array $fields): void
    {
        foreach ($fields as $name => $type) {

            if (! isset($this->params[$name])) {
                throw new Exception("Field $name doesn't set");
            }

            $actualType = gettype($this->params[$name]);

            if ($actualType !== $type) {
                throw new Exception("Field $name needs to be type '$type', actual - '$actualType'");
            }
        }
    }

    public function __toJson(string $prefix = ''): string
    {
        $vars = $this->params;

        if (! empty($prefix)) {
            $vars = [$prefix => $vars];
        }
        
        return json_encode($vars);
    }
}