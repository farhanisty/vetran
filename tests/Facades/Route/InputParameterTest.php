<?php

namespace Farhanisty\Vetran\Facades\Route;

use PHPUnit\Framework\TestCase;

class InputParameterTest extends TestCase
{
    public function testConstruct(): void
    {
        $inputParameter = new InputParameter();

        $inputParameter->set('id', 1);

        $this->assertEquals($inputParameter->get('id'), 1);
        $this->assertNull($inputParameter->get('coba'));

        $this->assertSame([
            'id' => 1
        ], $inputParameter->getAll());
    }
}
