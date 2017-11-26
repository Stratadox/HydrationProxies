<?php

declare(strict_types=1);

namespace Stratadox\Hydration\Proxying\Test;

use PHPUnit\Framework\TestCase;
use Stratadox\Hydration\Proxying\AlterableCollectionEntryUpdater;
use Stratadox\Hydration\Proxying\AlterableCollectionEntryUpdaterFactory;
use Stratadox\Hydration\UpdatesTheProxyOwner;

/**
 * @covers \Stratadox\Hydration\Proxying\AlterableCollectionEntryUpdaterFactory
 */
class AlterableCollectionEntryUpdaterFactory_produces_updaters_for_collection_entries extends TestCase
{
    /** @scenario */
    function making_an_AlterableCollectionEntryUpdater()
    {
        $updater = (new AlterableCollectionEntryUpdaterFactory)->makeUpdaterFor($this, 'foo', 10);

        $this->assertInstanceOf(UpdatesTheProxyOwner::class, $updater);
        $this->assertEquals(AlterableCollectionEntryUpdater::for($this, 'foo', 10), $updater);
    }
}
