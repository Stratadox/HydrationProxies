<?php

declare(strict_types=1);

namespace Stratadox\Hydration\Proxying\Test;

use PHPUnit\Framework\TestCase;
use Stratadox\Hydration\Proxying\ArrayEntryUpdater;
use Stratadox\Hydration\Proxying\Test\Foo\Foo;
use Stratadox\Hydration\Proxying\Test\Foo\FooProxy;

/**
 * @covers \Stratadox\Hydration\Proxying\ArrayEntryUpdater
 */
class ArrayEntryUpdater_allows_lazy_loading_with_arrays extends TestCase
{
    private $alterTheEntry;

    /** @scenario */
    function updating_private_immutable_collection_of_the_owner()
    {
        $this->alterTheEntry = [
            new FooProxy(),
            new FooProxy()
        ];

        $updater = ArrayEntryUpdater::for($this, 'alterTheEntry', 1);

        $foo = new Foo();
        $updater->updateWith($foo);

        $this->assertSame($foo, $this->alterTheEntry[1]);
    }
}
