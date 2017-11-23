<?php

declare(strict_types=1);

namespace Stratadox\Hydration\Proxying\Test\Foo;

use Stratadox\Hydration\LoadsProxiedObjects;
use Stratadox\Hydration\ObservesProxyLoading;

class FooLoader implements LoadsProxiedObjects
{
    /** @var ObservesProxyLoading[] */
    private $observers;

    public function attach(ObservesProxyLoading $observer) : void
    {
        $this->observers[] = $observer;
    }

    public function detach(ObservesProxyLoading $observer) : void
    {
        unset($this->observers[array_search($observer, $this->observers, true)]);
    }

    public function loadTheInstance()
    {
        $instance = new Foo();
        $this->tellThemWeMadeThis($instance);
        return $instance;
    }

    protected function tellThemWeMadeThis($instance)
    {
        foreach ($this->observers as $observer) {
            $observer->updateWith($instance);
        }
    }
}
