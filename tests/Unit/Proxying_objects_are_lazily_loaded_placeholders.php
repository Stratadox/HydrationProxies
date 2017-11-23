<?php

declare(strict_types=1);

namespace Stratadox\Hydration\Test;

use PHPUnit\Framework\TestCase;
use Stratadox\Hydration\Hydrator\SimpleHydrator;
use Stratadox\Hydration\ProducesProxies;
use Stratadox\Hydration\Proxying\ProxyFactory;
use Stratadox\Hydration\Proxying\Test\Foo\Foo;
use Stratadox\Hydration\Proxying\Test\Foo\FooLoaderFactory;
use Stratadox\Hydration\Proxying\Test\Foo\FooProxy;
use Stratadox\Hydration\Proxying\PropertyUpdaterFactory;

/**
 * @covers \Stratadox\Hydration\Proxying\Proxying
 */
class Proxying_objects_are_lazily_loaded_placeholders extends TestCase
{
    /** @var ProducesProxies */
    private $builder;

    /** @scenario */
    function loading_the_proxied_instance_when_called_upon()
    {
        $proxy = $this->builder->createFor($this, 'proxy');

        $this->assertInstanceOf(Foo::class, $proxy->__load());
    }

    /** @scenario */
    function redirecting_all_calls_to_the_loaded_instance()
    {
        /** @var FooProxy $proxy */
        $proxy = $this->builder->createFor($this, 'proxy');

        $this->assertEquals('baz', $proxy->bar());
    }

    protected function setUp()
    {
        $this->builder = ProxyFactory::fromThis(
            SimpleHydrator::forThe(FooProxy::class),
            new FooLoaderFactory,
            new PropertyUpdaterFactory
        );
    }
}
