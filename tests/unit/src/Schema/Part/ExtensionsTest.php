<?php

namespace AvalancheDevelopment\Approach\Schema\Part;

use AvalancheDevelopment\Approach\TestHelper\SetPropertyTrait;
use PHPUnit_Framework_TestCase;

class ExtensionsTest extends PHPUnit_Framework_TestCase
{

    use setPropertyTrait;

    protected $extensions;

    public function setUp()
    {
        $this->extensions = $this->getObjectForTrait(Extensions::class);
    }

    public function testGetExtensionGetsExtension()
    {
        $extensionName = 'x-vendor-two';
        $extensions = [
            'x-vendor-one' => 'one',
            'x-vendor-two' => 'two',
        ];

        $this->setProperty($this->extensions, 'extensions', $extensions);
        $result = $this->extensions->getExtension($extensionName);

        $this->assertEquals($extensions[$extensionName], $result);
    }

    public function testGetExtensionReturnsEmptyForUndefinedExtension()
    {
        $extensionName = 'x-vendor-three';
        $extensions = [
            'x-vendor-one' => 'one',
            'x-vendor-two' => 'two',
        ];

        $this->setProperty($this->extensions, 'extensions', $extensions);
        $result = $this->extensions->getExtension($extensionName);

        $this->assertNull($result);
    }

    public function testSetExtensionSetsExtension()
    {
        $extensionName = 'x-vendor-name';
        $extensionValue = 'some value';

        $this->extensions->setExtension($extensionName, $extensionValue);

        $this->assertAttributeEquals([
            $extensionName => $extensionValue,
        ], 'extensions', $this->extensions);
    }

    public function testSetsExtensionsStacksExtensions()
    {
        $extensionName = 'x-vendor-name';
        $extensionValue = 'some value';
        $prefilledExtensions = [
            'x-vendor-prefilled' => 'other value',
        ];

        $this->setProperty($this->extensions, 'extensions', $prefilledExtensions);
        $this->extensions->setExtension($extensionName, $extensionValue);

        $this->assertAttributeEquals(array_merge($prefilledExtensions, [
            $extensionName => $extensionValue,
        ]), 'extensions', $this->extensions);
    }
}
