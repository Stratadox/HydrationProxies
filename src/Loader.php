<?php

declare(strict_types=1);

namespace Stratadox\Hydration\Proxying;

use Stratadox\Hydration\LoadsProxiedObjects;
use Stratadox\Hydration\ObservesProxyLoading;

abstract class Loader implements LoadsProxiedObjects
{
    /** @var ObservesProxyLoading[] */
    private $observers;

    /** @var mixed|object */
    private $forWhom;

    /** @var string */
    private $property;

    /** @var string|null */
    private $position;

    public function __construct($forWhom, string $property, $position = null)
    {
        $this->forWhom = $forWhom;
        $this->property = $property;
        $this->position = $position;
    }

    public function attach(ObservesProxyLoading $observer) : void
    {
        $this->observers[] = $observer;
    }

    public function detach(ObservesProxyLoading $observer) : void
    {
        unset($this->observers[array_search($observer, $this->observers, true)]);
    }

    final public function loadTheInstance()
    {
        $instance = $this->doLoadTheInstanceDearest($this->forWhom, $this->property, $this->position);
        $this->tellThemWeMadeThis($instance);
        return $instance;
    }

    protected function tellThemWeMadeThis($instance)
    {
        foreach ($this->observers as $observer) {
            $observer->updateWith($instance);
        }
    }

    protected abstract function doLoadTheInstanceDearest($forWhom, string $property, $position = null);
}
