<?php

namespace Stratadox\Hydration\Proxying\Test\Foo;


use Stratadox\Hydration\LoadsProxiedObjects;
use Stratadox\Hydration\ProducesProxyLoaders;
use Stratadox\Hydration\UpdatesTheProxyOwner;

class FooLoaderFactory implements ProducesProxyLoaders
{
    public function makeLoaderThat(UpdatesTheProxyOwner $whenLoaded) : LoadsProxiedObjects
    {
        return new FooLoader($whenLoaded);
    }
}