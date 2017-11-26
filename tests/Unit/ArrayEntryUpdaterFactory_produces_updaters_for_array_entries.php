<?php

declare(strict_types=1);

namespace Stratadox\Hydration\Proxying\Test;

use PHPUnit\Framework\TestCase;
use Stratadox\Hydration\Proxying\ArrayEntryUpdater;
use Stratadox\Hydration\Proxying\ArrayEntryUpdaterFactory;
use Stratadox\Hydration\UpdatesTheProxyOwner;

/**
 * @covers \Stratadox\Hydration\Proxying\ArrayEntryUpdaterFactory
 */
class ArrayEntryUpdaterFactory_produces_updaters_for_array_entries extends TestCase
{
    /** @scenario */
    function making_an_ArrayEntryUpdater()
    {
        $updater = (new ArrayEntryUpdaterFactory)->makeUpdaterFor($this, 'foo', 10);

        $this->assertInstanceOf(UpdatesTheProxyOwner::class, $updater);
        $this->assertEquals(ArrayEntryUpdater::for($this, 'foo', 10), $updater);
    }
}
