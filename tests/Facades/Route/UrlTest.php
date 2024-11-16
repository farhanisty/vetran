<?php

namespace Farhanisty\Vetran\Facades\Route;

use Farhanisty\Vetran\Facades\URL;
use PHPUnit\Framework\TestCase;

class URLTest extends TestCase
{
    public function testConstruct(): void
    {
        $url = new URL('http://localhost/haiii/');
        $this->assertSame('/haiii/', $url->getPath());
    }
}
