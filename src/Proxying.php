<?php

declare(strict_types=1);

namespace Stratadox\Hydration\Proxying;

use function is_null;
use Stratadox\Hydration\LoadsProxiedObjects;
use Stratadox\Hydration\Proxy;

/**
 * Lazily loads proxy targets.
 *
 * @author Stratadox
 * @package Stratadox/Hydrate
 */
trait Proxying
{
    /** @var LoadsProxiedObjects */
    private $loader;

    /** @var object|null */
    private $instance;

    /** @return self */
    public function load()
    {
        if (is_null($this->instance)) {
            /** @var Proxy $this */
            $this->instance = $this->loader->loadTheInstance();
        }
        return $this->instance;
    }
}
