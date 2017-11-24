<?php

declare(strict_types=1);

namespace Stratadox\Hydration\Proxying\Test\Bar;

use Stratadox\Hydration\Proxy;
use Stratadox\Hydration\Proxying\Proxying;

class BarProxy extends Bar implements Proxy
{
    use Proxying;

    public function madeBy()
    {
        return $this->__load()->madeBy();
    }

    public function inProperty() : string
    {
        return $this->__load()->inProperty();
    }
}
