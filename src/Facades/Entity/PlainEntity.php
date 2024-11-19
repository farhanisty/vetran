<?php

namespace Farhanisty\Vetran\Facades\Entity;

abstract class PlainEntity
{
    public function toJson(): string
    {
        return json_encode(get_object_vars($this));
    }
}
