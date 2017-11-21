<?php

namespace Stratadox\Hydration\Test;

use PHPUnit\Framework\TestCase;
use Stratadox\Hydration\Proxying\PropertyUpdater;
use Stratadox\Hydration\Proxying\PropertyUpdaterFactory;
use Stratadox\Hydration\UpdatesTheProxyOwner;

/**
 * @covers \Stratadox\Hydration\Proxying\PropertyUpdaterFactory
 */
class PropertyUpdaterFactory_produces_updaters_for_properties extends TestCase
{
    /** @scenario */
    function making_a_PropertyUpdater()
    {
        $updater = (new PropertyUpdaterFactory)->makeUpdaterFor($this, 'foo');

        $this->assertInstanceOf(UpdatesTheProxyOwner::class, $updater);
        $this->assertEquals(PropertyUpdater::for($this, 'foo'), $updater);
    }
}