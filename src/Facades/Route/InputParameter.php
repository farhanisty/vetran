<?php

namespace Farhanisty\Vetran\Facades\Route;

class InputParameter
{
    private array $value;

    public function set($key, $value): void
    {
        $this->value[$key] = $value;
    }

    public function get($key)
    {
        if (!isset($this->value[$key])) {
            return false;
        }

        return $this->value[$key];
    }

    public function getAll(): array
    {
        return $this->value;
    }
}
