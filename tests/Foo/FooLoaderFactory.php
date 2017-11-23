<?php

namespace Stratadox\Hydration\Proxying\Test\Foo;


use Stratadox\Hydration\LoadsProxiedObjects;
use Stratadox\Hydration\ProducesProxyLoaders;
use Stratadox\Hydration\UpdatesTheProxyOwner;

class FooLoaderFactory implements ProducesProxyLoaders
{
    public function makeLoader() : LoadsProxiedObjects
    {
        return new FooLoader;
    }
}
