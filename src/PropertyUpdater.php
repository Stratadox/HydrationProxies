<?php

declare(strict_types=1);

namespace Stratadox\Hydration\Proxying;

use Closure;
use Stratadox\Hydration\UpdatesTheProxyOwner;

class PropertyUpdater implements UpdatesTheProxyOwner
{
    private $owner;
    private $propertyShouldReference;
    private $setter;

    public function __construct(
        $theOwner,
        string $theProperty,
        Closure $setter = null
    ) {
        $this->owner = $theOwner;
        $this->propertyShouldReference = $theProperty;
        $this->setter = $setter ?: function (string $property, $value) : void
        {
            $this->$property = $value;
        };
    }

    public static function for(
        $theOwner,
        string $ofTheProperty,
        Closure $setter = null
    ) : UpdatesTheProxyOwner
    {
        return new static($theOwner, $ofTheProperty, $setter);
    }

    public function updateThePropertyWith($theLoadedInstance) : void
    {
        $this->setter->call($this->owner,
            $this->propertyShouldReference,
            $theLoadedInstance
        );
    }
}