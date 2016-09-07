<?php

namespace AvalancheDevelopment\Approach\Builder;

use AvalancheDevelopment\Approach\BuilderFactory;
use AvalancheDevelopment\Approach\Schema\Contact as ContactObject;
use AvalancheDevelopment\Approach\SchemaObjectFactory;
use PHPUnit_Framework_TestCase;
use Psr\Log\LoggerAwareInterface;

class ContactTest extends PHPUnit_Framework_TestCase
{

    public function testContactImplementsBuilderInterface()
    {
        $builderFactory = $this->createMock(BuilderFactory::class);
        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);

        $contactBuilder = new Contact($builderFactory, $schemaObjectFactory);

        $this->assertInstanceOf(BuilderInterface::class, $contactBuilder);
    }

    public function testContactImplementsLoggerInterface()
    {
        $builderFactory = $this->createMock(BuilderFactory::class);
        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);

        $contactBuilder = new Contact($builderFactory, $schemaObjectFactory);

        $this->assertInstanceOf(LoggerAwareInterface::class, $contactBuilder);
    }

    public function testInvokeDoesNotSetNameIfEmpty()
    {
        $contactObject = $this->createMock(ContactObject::class);
        $contactObject->expects($this->never())
            ->method('setName');

        $builderFactory = $this->createMock(BuilderFactory::class);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Contact')
            ->willReturn($contactObject);

        $contactBuilder = new Contact($builderFactory, $schemaObjectFactory);
        $contactBuilder([]);
    }

    public function testInvokeSetsNameIfNotEmpty()
    {
        $name = 'Jack Black';

        $contactObject = $this->createMock(ContactObject::class);
        $contactObject->expects($this->once())
            ->method('setName')
            ->with($name);

        $builderFactory = $this->createMock(BuilderFactory::class);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Contact')
            ->willReturn($contactObject);

        $contactBuilder = new Contact($builderFactory, $schemaObjectFactory);
        $contactBuilder([ 'name' => $name ]);
    }

    public function testInvokeDoesNotSetUrlIfEmpty()
    {
        $contactObject = $this->createMock(ContactObject::class);
        $contactObject->expects($this->never())
            ->method('setUrl');

        $builderFactory = $this->createMock(BuilderFactory::class);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Contact')
            ->willReturn($contactObject);

        $contactBuilder = new Contact($builderFactory, $schemaObjectFactory);
        $contactBuilder([]);
    }

    public function testInvokeSetsUrlIfNotEmpty()
    {
        $url = 'http://domain.tld';

        $contactObject = $this->createMock(ContactObject::class);
        $contactObject->expects($this->once())
            ->method('setUrl')
            ->with($url);

        $builderFactory = $this->createMock(BuilderFactory::class);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Contact')
            ->willReturn($contactObject);

        $contactBuilder = new Contact($builderFactory, $schemaObjectFactory);
        $contactBuilder([ 'url' => $url ]);
    }

    public function testInvokeDoesNotSetEmailIfEmpty()
    {
        $contactObject = $this->createMock(ContactObject::class);
        $contactObject->expects($this->never())
            ->method('setEmail');

        $builderFactory = $this->createMock(BuilderFactory::class);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Contact')
            ->willReturn($contactObject);

        $contactBuilder = new Contact($builderFactory, $schemaObjectFactory);
        $contactBuilder([]);
    }

    public function testInvokeSetsEmailIfNotEmpty()
    {
        $email = 'jack@black.tld';

        $contactObject = $this->createMock(ContactObject::class);
        $contactObject->expects($this->once())
            ->method('setEmail')
            ->with($email);

        $builderFactory = $this->createMock(BuilderFactory::class);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Contact')
            ->willReturn($contactObject);

        $contactBuilder = new Contact($builderFactory, $schemaObjectFactory);
        $contactBuilder([ 'email' => $email ]);
    }

    public function testInvokeReturnsContactObject()
    {
        $contactObject = $this->createMock(ContactObject::class);

        $builderFactory = $this->createMock(BuilderFactory::class);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Contact')
            ->willReturn($contactObject);

        $contactBuilder = new Contact($builderFactory, $schemaObjectFactory);
        $result = $contactBuilder([]);

        $this->assertSame($result, $contactObject);
    }
}
