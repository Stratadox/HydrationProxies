<?php

declare(strict_types=1);

namespace Stratadox\Hydration\Proxying;

use Stratadox\Hydration\ProducesOwnerUpdaters;
use Stratadox\Hydration\UpdatesTheProxyOwner;

/**
 * Produces @see PropertyUpdater instances.
 *
 * @package Stratadox\Hydrate
 * @author Stratadox
 */
class PropertyUpdaterFactory implements ProducesOwnerUpdaters
{
    public function makeUpdaterFor(
        $theOwner,
        string $ofTheProperty,
        $atPosition = null
    ) : UpdatesTheProxyOwner
    {
        return PropertyUpdater::for($theOwner, $ofTheProperty);
    }
}
