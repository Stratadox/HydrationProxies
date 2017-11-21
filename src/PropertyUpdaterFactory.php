<?php

namespace Stratadox\Hydration\Proxying;

use Stratadox\Hydration\ProducesOwnerUpdaters;
use Stratadox\Hydration\UpdatesTheProxyOwner;

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
