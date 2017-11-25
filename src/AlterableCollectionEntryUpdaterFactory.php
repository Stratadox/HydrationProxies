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
class AlterableCollectionEntryUpdaterFactory implements ProducesOwnerUpdaters
{
    public function makeUpdaterFor(
        $theOwner,
        string $ofTheProperty,
        $atPosition = null
    ) : UpdatesTheProxyOwner
    {
        return AlterableCollectionEntryUpdater::for($theOwner, $ofTheProperty, $atPosition);
    }
}
