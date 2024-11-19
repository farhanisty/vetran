<?php

namespace Farhanisty\Vetran\Facades\Entity;

abstract class PlainEntity
{
    public function toJson(): string
    {
        return json_encode($this->toArray());
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
