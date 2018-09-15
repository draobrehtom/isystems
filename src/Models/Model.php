<?php

namespace App\Models;
use App\Service\Parameter;

interface Model {

    function create(Parameter $parameter): array;

    function read(Parameter $parameter): array;

    function update(Parameter $parameter): array;

    function delete(Parameter $parameter): array;
}