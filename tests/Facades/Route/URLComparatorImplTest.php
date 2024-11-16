<?php

namespace Farhanisty\Vetran\Facades\Route;

use PHPUnit\Framework\TestCase;

class URLComparatorImplTest extends TestCase
{
    public function testCompare(): void
    {
        $comparator = new URLComparatorImpl();
        $this->assertTrue($comparator->compare(new SimpleURL('/users/'), new SimpleURL('/users')));
        $this->assertTrue($comparator->compare(new SimpleURL('/users/hallo/haii'), new SimpleURL('/users/hallo/haii/')));
        $this->assertTrue($comparator->compare(new SimpleURL('/users/:id/'), new SimpleURL('/users/1')));
        $this->assertTrue($comparator->compare(new SimpleURL('/users/:id/getAll'), new SimpleURL('/users/1/getAll')));
    }
}
