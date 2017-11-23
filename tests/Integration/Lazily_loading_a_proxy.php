<?php

declare(strict_types=1);

namespace Stratadox\Hydration\Proxying\Test;

use PHPUnit\Framework\TestCase;
use Stratadox\Hydration\Hydrator\SimpleHydrator;
use Stratadox\Hydration\ProducesProxies;
use Stratadox\Hydration\Proxying\ProxyFactory;
use Stratadox\Hydration\Proxying\Test\Foo\Foo;
use Stratadox\Hydration\Proxying\Test\Foo\FooLoaderFactory;
use Stratadox\Hydration\Proxying\Test\Foo\FooProxy;
use Stratadox\Hydration\Proxying\PropertyUpdaterFactory;

/**
 * @coversNothing because integration test
 */
class Lazily_loading_a_proxy extends TestCase
{
    /** @var Foo */
    private $foo;

    /** @var ProducesProxies */
    private $proxyMaker;

    /** @scenario */
    function creating_a_proxy_in_a_property_and_loading_it_when_called_upon()
    {
        $this->foo = $this->proxyMaker->createFor($this, 'foo');

        $this->assertInstanceOf(FooProxy::class, $this->foo);

        $this->assertSame('baz', $this->foo->bar());

        $this->assertNotInstanceOf(FooProxy::class, $this->foo);
        $this->assertInstanceOf(Foo::class, $this->foo);
    }

    protected function setUp() : void
    {
        $this->proxyMaker = ProxyFactory::fromThis(
            SimpleHydrator::forThe(FooProxy::class),
            new FooLoaderFactory(),
            new PropertyUpdaterFactory()
        );
    }
}
