<?php

namespace App\Models;

use App\Service\Request;
use App\Service\Parameter;

abstract class Model {

    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public abstract function create(Parameter $parameter);

    public abstract function read(Parameter $parameter);

    public abstract function update(Parameter $parameter);

    public abstract function delete(Parameter $parameter);
}