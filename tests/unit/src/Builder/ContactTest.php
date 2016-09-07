<?php

namespace AvalancheDevelopment\Approach\Builder;

use AvalancheDevelopment\Approach\Schema\Contact as ContactObject;
use AvalancheDevelopment\Approach\SchemaObjectFactory;
use PHPUnit_Framework_TestCase;
use Psr\Log\LoggerAwareInterface;

class ContactTest extends PHPUnit_Framework_TestCase
{

    public function testContactImplementsBuilderInterface()
    {
        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);

        $contactBuilder = new Contact($schemaObjectFactory);

        $this->assertInstanceOf(BuilderInterface::class, $contactBuilder);
    }

    public function testContactImplementsLoggerInterface()
    {
        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);

        $contactBuilder = new Contact($schemaObjectFactory);

        $this->assertInstanceOf(LoggerAwareInterface::class, $contactBuilder);
    }

    public function testInvokeDoesNotSetNameIfEmpty()
    {
        $contactObject = $this->createMock(ContactObject::class);
        $contactObject->expects($this->never())
            ->method('setName');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Contact')
            ->willReturn($contactObject);

        $contactBuilder = new Contact($schemaObjectFactory);
        $contactBuilder([]);
    }

    public function testInvokeSetsNameIfNotEmpty()
    {
        $name = 'Jack Black';

        $contactObject = $this->createMock(ContactObject::class);
        $contactObject->expects($this->once())
            ->method('setName')
            ->with($name);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Contact')
            ->willReturn($contactObject);

        $contactBuilder = new Contact($schemaObjectFactory);
        $contactBuilder([ 'name' => $name ]);
    }

    public function testInvokeDoesNotSetUrlIfEmpty()
    {
        $contactObject = $this->createMock(ContactObject::class);
        $contactObject->expects($this->never())
            ->method('setUrl');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Contact')
            ->willReturn($contactObject);

        $contactBuilder = new Contact($schemaObjectFactory);
        $contactBuilder([]);
    }

    public function testInvokeSetsUrlIfNotEmpty()
    {
        $url = 'http://domain.tld';

        $contactObject = $this->createMock(ContactObject::class);
        $contactObject->expects($this->once())
            ->method('setUrl')
            ->with($url);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Contact')
            ->willReturn($contactObject);

        $contactBuilder = new Contact($schemaObjectFactory);
        $contactBuilder([ 'url' => $url ]);
    }

    public function testInvokeDoesNotSetEmailIfEmpty()
    {
        $contactObject = $this->createMock(ContactObject::class);
        $contactObject->expects($this->never())
            ->method('setEmail');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Contact')
            ->willReturn($contactObject);

        $contactBuilder = new Contact($schemaObjectFactory);
        $contactBuilder([]);
    }

    public function testInvokeSetsEmailIfNotEmpty()
    {
        $email = 'jack@black.tld';

        $contactObject = $this->createMock(ContactObject::class);
        $contactObject->expects($this->once())
            ->method('setEmail')
            ->with($email);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Contact')
            ->willReturn($contactObject);

        $contactBuilder = new Contact($schemaObjectFactory);
        $contactBuilder([ 'email' => $email ]);
    }

    public function testInvokeReturnsContactObject()
    {
        $contactObject = $this->createMock(ContactObject::class);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Contact')
            ->willReturn($contactObject);

        $contactBuilder = new Contact($schemaObjectFactory);
        $result = $contactBuilder([]);

        $this->assertSame($result, $contactObject);
    }
}
