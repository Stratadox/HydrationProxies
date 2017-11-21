<?php

namespace Stratadox\Hydration\Test;

use PHPUnit\Framework\TestCase;
use Stratadox\Hydration\Hydrator\SimpleHydrator;
use Stratadox\Hydration\ProducesProxies;
use Stratadox\Hydration\Proxy;
use Stratadox\Hydration\Proxying\ProxyBuilder;
use Stratadox\Hydration\Proxying\Test\Foo\FooLoaderFactory;
use Stratadox\Hydration\Proxying\Test\Foo\FooProxy;
use Stratadox\Hydration\Proxying\PropertyUpdaterFactory;

/**
 * @covers \Stratadox\Hydration\Proxying\ProxyBuilder
 */
class ProxyBuilder_produces_proxies_for_lazy_relationships extends TestCase
{
    /** @var ProducesProxies */
    private $builder;

    /** @scenario */
    function making_a_proxy_object()
    {
        $proxy = $this->builder->createFor($this, 'proxy');

        $this->assertInstanceOf(Proxy::class, $proxy);
    }

    protected function setUp()
    {
        $this->builder = ProxyBuilder::fromThis(
            SimpleHydrator::forThe(FooProxy::class),
            new FooLoaderFactory,
            new PropertyUpdaterFactory
        );
    }
}
