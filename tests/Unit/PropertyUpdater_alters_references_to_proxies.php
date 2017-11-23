<?php

declare(strict_types=1);

namespace Stratadox\Hydration\Test;

use PHPUnit\Framework\TestCase;
use Stratadox\Hydration\Proxying\PropertyUpdater;
use Stratadox\Hydration\Proxying\Test\Foo\Foo;
use Stratadox\Hydration\Proxying\Test\Foo\FooProxy;

/**
 * @covers \Stratadox\Hydration\Proxying\PropertyUpdater
 */
class PropertyUpdater_alters_references_to_proxies extends TestCase
{
    private $alterTheProperty;

    /** @scenario */
    function altering_private_properties_of_the_owner()
    {
        $this->alterTheProperty = new FooProxy();

        $updater = PropertyUpdater::for($this, 'alterTheProperty');

        $foo = new Foo();
        $updater->updateWith($foo);

        $this->assertSame($foo, $this->alterTheProperty);
    }
}
