<?php

namespace Farhanisty\Vetran\Facades\Route;

use PHPUnit\Framework\TestCase;

class SimpleUrlTest extends TestCase
{
    public function testConstruct(): void
    {
        $url = new SimpleURL('//localhost/haiii//');
        $this->assertSame(
            'localhost/haiii',
            $url->getUrl()
        );
    }
}
