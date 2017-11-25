<?php

declare(strict_types=1);

namespace Stratadox\Hydration\Proxying\Test;

use PHPUnit\Framework\TestCase;
use Stratadox\Hydration\Proxying\AlterableCollectionEntryUpdater;
use Stratadox\Hydration\Proxying\Test\Foo\Foo;
use Stratadox\Hydration\Proxying\Test\Foo\FooProxy;
use Stratadox\Hydration\Proxying\Test\Foo\Foos;
use Stratadox\Hydration\UnmappableInput;

/**
 * @covers \Stratadox\Hydration\Proxying\AlterableCollectionEntryUpdater
 * @covers \Stratadox\Hydration\Proxying\UnexpectedPropertyType
 */
class AlterableCollectionEntryUpdater_allows_lazy_loading_with_immutable_collections extends TestCase
{
    private $alterTheEntry;

    /** @scenario */
    function updating_private_immutable_collection_of_the_owner()
    {
        $this->alterTheEntry = new Foos(
            new FooProxy(),
            new FooProxy()
        );

        $updater = AlterableCollectionEntryUpdater::for($this, 'alterTheEntry', 1);

        $foo = new Foo();
        $updater->updateWith($foo);

        $this->assertSame($foo, $this->alterTheEntry[1]);
    }

    /** @scenario */
    function the_value_must_have_the_expected_type()
    {
        $this->alterTheEntry = [
            new FooProxy(),
            new FooProxy()
        ];

        $updater = AlterableCollectionEntryUpdater::for($this, 'alterTheEntry', 1);

        $this->expectException(UnmappableInput::class);
        $updater->updateWith(new Foo());
    }
}
