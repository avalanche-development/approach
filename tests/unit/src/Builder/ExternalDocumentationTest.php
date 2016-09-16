<?php

namespace AvalancheDevelopment\Approach\Builder;

use AvalancheDevelopment\Approach\Schema\ExternalDocumentation as ExternalDocumentationObject;
use AvalancheDevelopment\Approach\SchemaObjectFactory;
use PHPUnit_Framework_TestCase;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use ReflectionClass;

class ExternalDocumentationTest extends PHPUnit_Framework_TestCase
{

    public function testExternalDocumentationImplementsBuilderInterface()
    {
        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);

        $externalDocumentationBuilder = new ExternalDocumentation($schemaObjectFactory);

        $this->assertInstanceOf(BuilderInterface::class, $externalDocumentationBuilder);
    }

    public function testExternalDocumentationImplementsLoggerInterface()
    {
        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);

        $externalDocumentationBuilder = new ExternalDocumentation($schemaObjectFactory);

        $this->assertInstanceOf(LoggerAwareInterface::class, $externalDocumentationBuilder);
    }

    public function testInvokeDoesNotSetDescriptionIfEmpty()
    {
        $externalDocumentationObject = $this->createMock(ExternalDocumentationObject::class);
        $externalDocumentationObject->expects($this->never())
            ->method('setDescription');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('ExternalDocumentation')
            ->willReturn($externalDocumentationObject);

        $externalDocumentationBuilder = new ExternalDocumentation($schemaObjectFactory);
        $externalDocumentationBuilder([ 'url' => 'http://domain.tld/docs' ]);
    }

    public function testInvokeSetsDescriptionIfNotEmpty()
    {
        $description = 'An Awesome Description';

        $externalDocumentationObject = $this->createMock(ExternalDocumentationObject::class);
        $externalDocumentationObject->expects($this->once())
            ->method('setDescription')
            ->with($description);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('ExternalDocumentation')
            ->willReturn($externalDocumentationObject);

        $externalDocumentationBuilder = new ExternalDocumentation($schemaObjectFactory);
        $externalDocumentationBuilder([
            'description' => $description,
            'url' => 'http://domain.tld/docs',
        ]);
    }

    public function testInvokeBailsIfUrlIsEmpty()
    {
        $logger = $this->createMock(LoggerInterface::class);
        $logger->expects($this->once())
            ->method('warning')
            ->with('Could not build ExternalDocumentation object - missing url field');

        $externalDocsObject = $this->createMock(ExternalDocumentationObject::class);
        $externalDocsObject->expects($this->never())
            ->method('setUrl');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('ExternalDocumentation')
            ->willReturn($externalDocsObject);

        $externalDocsBuilder = new ExternalDocumentation($schemaObjectFactory);
        $externalDocsBuilder->setLogger($logger);
        $result = $externalDocsBuilder([]);

        $this->assertNull($result);
    }

    public function testInvokeSetsUrlIfNotEmpty()
    {
        $url = 'http://domain.tld/docs';

        $externalDocumentationObject = $this->createMock(ExternalDocumentationObject::class);
        $externalDocumentationObject->expects($this->once())
            ->method('setUrl')
            ->with($url);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('ExternalDocumentation')
            ->willReturn($externalDocumentationObject);

        $externalDocumentationBuilder = new ExternalDocumentation($schemaObjectFactory);
        $externalDocumentationBuilder([ 'url' => $url ]);
    }
}
