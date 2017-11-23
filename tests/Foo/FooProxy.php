<?php

namespace Stratadox\Hydration\Proxying\Test\Foo;

use Stratadox\Hydration\Proxy;
use Stratadox\Hydration\Proxying\Proxying;

class FooProxy extends Foo implements Proxy
{
    use Proxying;

    function bar() : string
    {
        return $this->__load()->bar();
    }
}
