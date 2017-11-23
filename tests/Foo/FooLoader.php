<?php

declare(strict_types=1);

namespace Stratadox\Hydration\Proxying\Test\Foo;

use Stratadox\Hydration\Proxying\Loader;

class FooLoader extends Loader
{
    protected function doLoadTheInstanceDearest()
    {
        return new Foo;
    }
}
