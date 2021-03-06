<?php

declare(strict_types=1);

namespace Stratadox\Hydration\Proxying\Test\Foo;

use Stratadox\Hydration\LoadsProxiedObjects;
use Stratadox\Hydration\ProducesProxyLoaders;
use Stratadox\Hydration\UpdatesTheProxyOwner;

class FooLoaderFactory implements ProducesProxyLoaders
{
    public function makeLoaderFor(
        $theOwner,
        string $ofTheProperty,
        $atPosition = null
    ) : LoadsProxiedObjects
    {
        return new FooLoader($theOwner, $ofTheProperty);
    }
}
