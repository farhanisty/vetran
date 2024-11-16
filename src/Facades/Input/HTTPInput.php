<?php

namespace Farhanisty\Vetran\Facades\Input;

use Farhanisty\Vetran\Facades\Route\InputParameter;

class HTTPInput
{
    private InputParameter $inputParameter;

    public function __construct($inputParameter)
    {
        $this->inputParameter = $inputParameter;
    }

    public function get(): ?array
    {
        return $_GET;
    }

    public function post(): ?array
    {
        return $_POST;
    }

    public function inputParameter(): ?array
    {
        return $this->inputParameter->getAll();
    }
}
