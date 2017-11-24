<?php

declare(strict_types=1);

namespace Stratadox\Hydration\Proxying\Test;

use PHPUnit\Framework\TestCase;
use Stratadox\Hydration\Hydrator\SimpleHydrator;
use Stratadox\Hydration\ProducesProxies;
use Stratadox\Hydration\Proxying\ProxyFactory;
use Stratadox\Hydration\Proxying\Test\Bar\Bar;
use Stratadox\Hydration\Proxying\Test\Bar\BarLoaderFactory;
use Stratadox\Hydration\Proxying\Test\Bar\BarProxy;
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

    /** @var Bar */
    private $bar;

    /** @scenario */
    function creating_a_proxy_in_a_property_and_loading_it_when_called_upon()
    {
        $this->foo = $this->fooProxyMaker()->createFor($this, 'foo');

        $this->assertInstanceOf(FooProxy::class, $this->foo);

        $this->assertSame('baz', $this->foo->bar());

        $this->assertNotInstanceOf(FooProxy::class, $this->foo);
        $this->assertInstanceOf(Foo::class, $this->foo);
    }

    /** @scenario */
    function loaders_receive_information_on_which_object_to_load()
    {
        $this->bar = $this->barProxyMaker()->createFor($this, 'bar');

        $this->assertSame($this, $this->bar->madeBy());
        $this->assertSame('bar', $this->bar->inProperty());
    }

    private function fooProxyMaker() : ProducesProxies
    {
        return ProxyFactory::fromThis(
            SimpleHydrator::forThe(FooProxy::class),
            new FooLoaderFactory(),
            new PropertyUpdaterFactory()
        );
    }

    private function barProxyMaker() : ProducesProxies
    {
        return ProxyFactory::fromThis(
            SimpleHydrator::forThe(BarProxy::class),
            new BarLoaderFactory(),
            new PropertyUpdaterFactory()
        );
    }
}
