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

    public function jsonBody(): array|bool
    {
        $jsonBody = file_get_contents('php://input');

        $data = json_decode($jsonBody, true);
        if (json_last_error() === JSON_ERROR_NONE) {
            return $data;
        } else {
            return false;
        }
    }
}
