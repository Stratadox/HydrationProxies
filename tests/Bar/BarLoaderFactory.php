<?php

declare(strict_types=1);

namespace Stratadox\Hydration\Proxying\Test\Bar;

use Stratadox\Hydration\LoadsProxiedObjects;
use Stratadox\Hydration\ProducesProxyLoaders;

class BarLoaderFactory implements ProducesProxyLoaders
{
    public function makeLoaderFor(
        $theOwner,
        string $ofTheProperty,
        $atPosition = null
    ) : LoadsProxiedObjects
    {
        return new BarLoader($theOwner, $ofTheProperty);
    }
}
