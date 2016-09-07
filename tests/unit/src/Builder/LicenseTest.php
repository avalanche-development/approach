<?php

namespace AvalancheDevelopment\Approach\Builder;

use AvalancheDevelopment\Approach\Schema\License as LicenseObject;
use AvalancheDevelopment\Approach\SchemaObjectFactory;
use PHPUnit_Framework_TestCase;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;

class LicenseTest extends PHPUnit_Framework_TestCase
{

    public function testLicenseImplementsBuilderInterface()
    {
        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);

        $licenseBuilder = new License($schemaObjectFactory);

        $this->assertInstanceOf(BuilderInterface::class, $licenseBuilder);
    }

    public function testLicenseImplementsLoggerInterface()
    {
        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);

        $licenseBuilder = new License($schemaObjectFactory);

        $this->assertInstanceOf(LoggerAwareInterface::class, $licenseBuilder);
    }

    public function testInvokeBailsIfNameIsEmpty()
    {
        $logger = $this->createMock(LoggerInterface::class);
        $logger->expects($this->once())
            ->method('warning')
            ->with('Could not build License object - missing name');

        $licenseObject = $this->createMock(LicenseObject::class);
        $licenseObject->expects($this->never())
            ->method('setName');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('License')
            ->willReturn($licenseObject);

        $licenseBuilder = new License($schemaObjectFactory);
        $licenseBuilder->setLogger($logger);
        $result = $licenseBuilder([]);

        $this->assertNull($result);
    }

    public function testInvokeSetsNameIfNotEmpty()
    {
        $name = 'Apache 2.0';

        $licenseObject = $this->createMock(LicenseObject::class);
        $licenseObject->expects($this->once())
            ->method('setName')
            ->with($name);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('License')
            ->willReturn($licenseObject);

        $licenseBuilder = new License($schemaObjectFactory);
        $licenseBuilder([ 'name' => $name ]);
    }

    public function testInvokeDoesNotSetUrlIfEmpty()
    {
        $licenseObject = $this->createMock(LicenseObject::class);
        $licenseObject->expects($this->never())
            ->method('setUrl');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('License')
            ->willReturn($licenseObject);

        $licenseBuilder = new License($schemaObjectFactory);
        $licenseBuilder([ 'name' => 'Apache 2.0' ]);
    }

    public function testInvokeSetsUrlIfNotEmpty()
    {
        $licenseObject = $this->createMock(LicenseObject::class);
        $licenseObject->expects($this->once())
            ->method('setUrl')
            ->with('http://domain.tld');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('License')
            ->willReturn($licenseObject);

        $licenseBuilder = new License($schemaObjectFactory);
        $licenseBuilder([
            'name' => 'Apache 2.0',
            'url' => 'http://domain.tld'
        ]);
    }

    public function testInvokeReturnsLicenseObject()
    {
        $licenseObject = $this->createMock(LicenseObject::class);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('License')
            ->willReturn($licenseObject);

        $licenseBuilder = new License($schemaObjectFactory);
        $result = $licenseBuilder([ 'name' => 'Apache 2.0' ]);

        $this->assertSame($result, $licenseObject);
    }
}
