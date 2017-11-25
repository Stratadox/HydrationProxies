<?php

namespace Stratadox\Hydration\Proxying;

use function get_class;
use function gettype;
use InvalidArgumentException;
use function is_object;
use function sprintf;
use Stratadox\Hydration\UnmappableInput;

class UnexpectedPropertyType extends InvalidArgumentException implements UnmappableInput
{
    public static function expectedThe(
        string $interface,
        $object,
        string $property,
        $actual
    ) : UnmappableInput
    {
        return new static(sprintf(
            'Could not assign the value for `%s::%s`, got an `%s` instead of `%s`',
            get_class($object),
            $property,
            is_object($actual) ? get_class($actual) : gettype($actual),
            $interface
        ));
    }
}
