<?php

namespace Stratadox\Hydration\Proxying\Test\Foo;

use Stratadox\Hydration\LoadsProxiedObjects;
use Stratadox\Hydration\UpdatesTheProxyOwner;

class FooLoader implements LoadsProxiedObjects
{
    private $updater;

    public function __construct(UpdatesTheProxyOwner $updater)
    {
        $this->updater = $updater;
    }

    public function loadTheInstance()
    {
        $instance = new Foo();
        $this->updater->updateThePropertyWith($instance);
        return $instance;
    }
}
