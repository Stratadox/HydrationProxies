<?php

declare(strict_types=1);

namespace Stratadox\Hydration\Proxying\Test\Bar;

use Stratadox\Hydration\Proxying\Loader;

class BarLoader extends Loader
{
    protected function doLoadTheInstanceDearest($forWhom, string $property, $position = null)
    {
        return new Bar($forWhom, $property);
    }
}
