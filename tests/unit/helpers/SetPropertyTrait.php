<?php

namespace AvalancheDevelopment\Approach\TestHelper;

use ReflectionClass;

trait SetPropertyTrait
{

    protected function setProperty($object, $property, $value)
    {
        $reflectedObject = new ReflectionClass($object);
        $reflectedProperty = $reflectedObject->getProperty($property);
        $reflectedProperty->setAccessible(true);
        $reflectedProperty->setValue($object, $value);
        return $object;
    }
}
