<?php

declare(strict_types=1);

namespace Stratadox\Hydration\Proxying;

use Stratadox\Hydration\ProducesOwnerUpdaters;
use Stratadox\Hydration\UpdatesTheProxyOwner;

/**
 * Produces @see ArrayEntryUpdater instances.
 *
 * @package Stratadox\Hydrate
 * @author Stratadox
 */
class ArrayEntryUpdaterFactory implements ProducesOwnerUpdaters
{
    public function makeUpdaterFor(
        $theOwner,
        string $ofTheProperty,
        $atPosition = null
    ) : UpdatesTheProxyOwner
    {
        return ArrayEntryUpdater::for($theOwner, $ofTheProperty, $atPosition);
    }
}
