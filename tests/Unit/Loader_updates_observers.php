<?php

declare(strict_types=1);

namespace Stratadox\Hydration\Proxying\Test;

use PHPUnit\Framework\TestCase;
use Stratadox\Hydration\Proxying\Test\Foo\FooLoader;
use Stratadox\Hydration\Proxying\Test\Foo\FooLoadingObserver;

/**
 * @covers \Stratadox\Hydration\Proxying\Loader
 */
class Loader_updates_observers extends TestCase
{
    /** @scenario */
    function update_with_result_after_loading()
    {
        $observer = new FooLoadingObserver;
        $loader = new FooLoader(null, '');

        $loader->attach($observer);
        $foo = $loader->loadTheInstance();

        $this->assertSame($foo, $observer->instance());
    }

    /** @scenario */
    function do_not_update_before_loading()
    {
        $observer = new FooLoadingObserver;
        $loader = new FooLoader(null, '');

        $loader->attach($observer);

        $this->assertNull($observer->instance());
    }

    /** @scenario */
    function do_not_update_if_detached()
    {
        $observer = new FooLoadingObserver;
        $loader = new FooLoader(null, '');

        $loader->attach($observer);
        $loader->detach($observer);
        $loader->loadTheInstance();

        $this->assertNull($observer->instance());
    }
}
