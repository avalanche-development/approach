<?php

namespace AvalancheDevelopment\Approach\Builder;

use AvalancheDevelopment\Approach\Schema\Info as InfoObject;
use AvalancheDevelopment\Approach\Schema\Paths as PathsObject;
use AvalancheDevelopment\Approach\Schema\Definitions as DefinitionsObject;
use AvalancheDevelopment\Approach\Schema\ParametersDefinitions as ParametersDefinitionsObject;
use AvalancheDevelopment\Approach\Schema\ResponsesDefinitions as ResponsesDefinitionsObject;
use AvalancheDevelopment\Approach\Schema\SecurityDefinitions as SecurityDefinitionsObject;
use AvalancheDevelopment\Approach\Schema\ExternalDocumentation as ExternalDocumentationObject;
use AvalancheDevelopment\Approach\Schema\Swagger as SwaggerObject;
use AvalancheDevelopment\Approach\SchemaObjectFactory;
use PHPUnit_Framework_TestCase;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use ReflectionClass;

class SwaggerTest extends PHPUnit_Framework_TestCase
{

    public function testSwaggerImplementsBuilderInterface()
    {
        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);

        $swaggerBuilder = new Swagger($schemaObjectFactory);

        $this->assertInstanceOf(BuilderInterface::class, $swaggerBuilder);
    }

    public function testSwaggerImplementsLoggerInterface()
    {
        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);

        $swaggerBuilder = new Swagger($schemaObjectFactory);

        $this->assertInstanceOf(LoggerAwareInterface::class, $swaggerBuilder);
    }

    public function testInvokeBailsIfSwaggerIsEmpty()
    {
        $logger = $this->createMock(LoggerInterface::class);
        $logger->expects($this->once())
            ->method('warning')
            ->with('Could not build Swagger object - missing swagger field');

        $swaggerObject = $this->createMock(SwaggerObject::class);
        $swaggerObject->expects($this->never())
            ->method('setSwagger');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Swagger')
            ->willReturn($swaggerObject);

        $swaggerBuilder = new Swagger($schemaObjectFactory);
        $swaggerBuilder->setLogger($logger);
        $result = $swaggerBuilder([]);

        $this->assertNull($result);
    }

    public function testInvokeSetsSwaggerIfNotEmpty()
    {
        $swagger = '2.0';

        $swaggerObject = $this->createMock(SwaggerObject::class);
        $swaggerObject->expects($this->once())
            ->method('setSwagger')
            ->with($swagger);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Swagger')
            ->willReturn($swaggerObject);

        $swaggerBuilder = $this->getMockBuilder(Swagger::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildInfo', 'buildPaths' ])
            ->getMock();
        $swaggerBuilder->method('buildInfo')
            ->willReturn($this->createMock(InfoObject::class));
        $swaggerBuilder->method('buildPaths')
            ->willReturn($this->createMock(PathsObject::class));
        $swaggerBuilder([ 'swagger' => $swagger ]);
    }

    public function testInvokeBailsIfInfoIsEmpty()
    {
        $logger = $this->createMock(LoggerInterface::class);
        $logger->expects($this->once())
            ->method('warning')
            ->with('Could not build Swagger object - invalid info attribute');

        $swaggerObject = $this->createMock(SwaggerObject::class);
        $swaggerObject->expects($this->never())
            ->method('setInfo');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Swagger')
            ->willReturn($swaggerObject);

        $swaggerBuilder = $this->getMockBuilder(Swagger::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildInfo', 'buildPaths' ])
            ->getMock();
        $swaggerBuilder->method('buildPaths')
            ->willReturn($this->createMock(PathsObject::class));
        $swaggerBuilder->setLogger($logger);
        $swaggerBuilder([ 'swagger' => '2.0' ]);
    }

    public function testInvokeSetsInfoIfNotEmpty()
    {
        $infoObject = $this->createMock(InfoObject::class);

        $swaggerObject = $this->createMock(SwaggerObject::class);
        $swaggerObject->expects($this->once())
            ->method('setInfo')
            ->with($infoObject);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Swagger')
            ->willReturn($swaggerObject);

        $swaggerBuilder = $this->getMockBuilder(Swagger::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildInfo', 'buildPaths' ])
            ->getMock();
        $swaggerBuilder->method('buildInfo')
            ->willReturn($this->createMock(InfoObject::class));
        $swaggerBuilder->method('buildPaths')
            ->willReturn($this->createMock(PathsObject::class));
        $swaggerBuilder([ 'swagger' => '2.0' ]);
    }

    public function testInvokeDoesNotSetHostIfEmpty()
    {
        $swaggerObject = $this->createMock(SwaggerObject::class);
        $swaggerObject->expects($this->never())
            ->method('setHost');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Swagger')
            ->willReturn($swaggerObject);

        $swaggerBuilder = $this->getMockBuilder(Swagger::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildInfo', 'buildPaths' ])
            ->getMock();
        $swaggerBuilder->method('buildInfo')
            ->willReturn($this->createMock(InfoObject::class));
        $swaggerBuilder->method('buildPaths')
            ->willReturn($this->createMock(PathsObject::class));
        $swaggerBuilder([ 'swagger' => '2.0' ]);
    }

    public function testInvokeSetsHostIfNotEmpty()
    {
        $host = 'http://domain.tld';

        $swaggerObject = $this->createMock(SwaggerObject::class);
        $swaggerObject->expects($this->once())
            ->method('setHost')
            ->with($host);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Swagger')
            ->willReturn($swaggerObject);

        $swaggerBuilder = $this->getMockBuilder(Swagger::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildInfo', 'buildPaths' ])
            ->getMock();
        $swaggerBuilder->method('buildInfo')
            ->willReturn($this->createMock(InfoObject::class));
        $swaggerBuilder->method('buildPaths')
            ->willReturn($this->createMock(PathsObject::class));
        $swaggerBuilder([
            'swagger' => '2.0',
            'host' => $host,
        ]);
    }

    public function testInvokeDoesNotSetBasePathIfEmpty()
    {
        $swaggerObject = $this->createMock(SwaggerObject::class);
        $swaggerObject->expects($this->never())
            ->method('setBasePath');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Swagger')
            ->willReturn($swaggerObject);

        $swaggerBuilder = $this->getMockBuilder(Swagger::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildInfo', 'buildPaths' ])
            ->getMock();
        $swaggerBuilder->method('buildInfo')
            ->willReturn($this->createMock(InfoObject::class));
        $swaggerBuilder->method('buildPaths')
            ->willReturn($this->createMock(PathsObject::class));
        $swaggerBuilder([ 'swagger' => '2.0' ]);
    }

    public function testInvokeSetsBasePathIfNotEmpty()
    {
        $basePath = '/v1';

        $swaggerObject = $this->createMock(SwaggerObject::class);
        $swaggerObject->expects($this->once())
            ->method('setBasePath')
            ->with($basePath);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Swagger')
            ->willReturn($swaggerObject);

        $swaggerBuilder = $this->getMockBuilder(Swagger::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildInfo', 'buildPaths' ])
            ->getMock();
        $swaggerBuilder->method('buildInfo')
            ->willReturn($this->createMock(InfoObject::class));
        $swaggerBuilder->method('buildPaths')
            ->willReturn($this->createMock(PathsObject::class));
        $swaggerBuilder([
            'swagger' => '2.0',
            'basePath' => $basePath,
        ]);
    }

    public function testInvokeDoesNotSetSchemesIfEmpty()
    {
        $swaggerObject = $this->createMock(SwaggerObject::class);
        $swaggerObject->expects($this->never())
            ->method('setSchemes');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Swagger')
            ->willReturn($swaggerObject);

        $swaggerBuilder = $this->getMockBuilder(Swagger::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildInfo', 'buildPaths' ])
            ->getMock();
        $swaggerBuilder->method('buildInfo')
            ->willReturn($this->createMock(InfoObject::class));
        $swaggerBuilder->method('buildPaths')
            ->willReturn($this->createMock(PathsObject::class));
        $swaggerBuilder([ 'swagger' => '2.0' ]);
    }

    public function testInvokeSetsSchemesIfNotEmpty()
    {
        $schemes = [ 'http' ];

        $swaggerObject = $this->createMock(SwaggerObject::class);
        $swaggerObject->expects($this->once())
            ->method('setSchemes')
            ->with($schemes);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Swagger')
            ->willReturn($swaggerObject);

        $swaggerBuilder = $this->getMockBuilder(Swagger::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildInfo', 'buildPaths' ])
            ->getMock();
        $swaggerBuilder->method('buildInfo')
            ->willReturn($this->createMock(InfoObject::class));
        $swaggerBuilder->method('buildPaths')
            ->willReturn($this->createMock(PathsObject::class));
        $swaggerBuilder([
            'swagger' => '2.0',
            'schemes' => $schemes,
        ]);
    }

    public function testInvokeDoesNotSetConsumesIfEmpty()
    {
        $swaggerObject = $this->createMock(SwaggerObject::class);
        $swaggerObject->expects($this->never())
            ->method('setConsumes');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Swagger')
            ->willReturn($swaggerObject);

        $swaggerBuilder = $this->getMockBuilder(Swagger::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildInfo', 'buildPaths' ])
            ->getMock();
        $swaggerBuilder->method('buildInfo')
            ->willReturn($this->createMock(InfoObject::class));
        $swaggerBuilder->method('buildPaths')
            ->willReturn($this->createMock(PathsObject::class));
        $swaggerBuilder([ 'swagger' => '2.0' ]);
    }

    public function testInvokeSetsConsumesIfNotEmpty()
    {
        $consumes = [ 'application/json' ];

        $swaggerObject = $this->createMock(SwaggerObject::class);
        $swaggerObject->expects($this->once())
            ->method('setConsumes')
            ->with($consumes);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Swagger')
            ->willReturn($swaggerObject);

        $swaggerBuilder = $this->getMockBuilder(Swagger::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildInfo', 'buildPaths' ])
            ->getMock();
        $swaggerBuilder->method('buildInfo')
            ->willReturn($this->createMock(InfoObject::class));
        $swaggerBuilder->method('buildPaths')
            ->willReturn($this->createMock(PathsObject::class));
        $swaggerBuilder([
            'swagger' => '2.0',
            'consumes' => $consumes,
        ]);
    }

    public function testInvokeDoesNotSetProducesIfEmpty()
    {
        $swaggerObject = $this->createMock(SwaggerObject::class);
        $swaggerObject->expects($this->never())
            ->method('setProduces');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Swagger')
            ->willReturn($swaggerObject);

        $swaggerBuilder = $this->getMockBuilder(Swagger::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildInfo', 'buildPaths' ])
            ->getMock();
        $swaggerBuilder->method('buildInfo')
            ->willReturn($this->createMock(InfoObject::class));
        $swaggerBuilder->method('buildPaths')
            ->willReturn($this->createMock(PathsObject::class));
        $swaggerBuilder([ 'swagger' => '2.0' ]);
    }

    public function testInvokeSetsProducesIfNotEmpty()
    {
        $produces = [ 'application/json' ];

        $swaggerObject = $this->createMock(SwaggerObject::class);
        $swaggerObject->expects($this->once())
            ->method('setProduces')
            ->with($produces);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Swagger')
            ->willReturn($swaggerObject);

        $swaggerBuilder = $this->getMockBuilder(Swagger::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildInfo', 'buildPaths' ])
            ->getMock();
        $swaggerBuilder->method('buildInfo')
            ->willReturn($this->createMock(InfoObject::class));
        $swaggerBuilder->method('buildPaths')
            ->willReturn($this->createMock(PathsObject::class));
        $swaggerBuilder([
            'swagger' => '2.0',
            'produces' => $produces,
        ]);
    }

    public function testInvokeBailsIfPathsIsEmpty()
    {
        $logger = $this->createMock(LoggerInterface::class);
        $logger->expects($this->once())
            ->method('warning')
            ->with('Could not build Swagger object - invalid paths attribute');

        $swaggerObject = $this->createMock(SwaggerObject::class);
        $swaggerObject->expects($this->never())
            ->method('setPaths');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Swagger')
            ->willReturn($swaggerObject);

        $swaggerBuilder = $this->getMockBuilder(Swagger::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildInfo', 'buildPaths' ])
            ->getMock();
        $swaggerBuilder->method('buildInfo')
            ->willReturn($this->createMock(InfoObject::class));
        $swaggerBuilder->setLogger($logger);
        $swaggerBuilder([ 'swagger' => '2.0' ]);
    }

    public function testInvokeSetsPathsIfNotEmpty()
    {
        $pathsObject = $this->createMock(PathsObject::class);

        $swaggerObject = $this->createMock(SwaggerObject::class);
        $swaggerObject->expects($this->once())
            ->method('setPaths')
            ->with($pathsObject);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Swagger')
            ->willReturn($swaggerObject);

        $swaggerBuilder = $this->getMockBuilder(Swagger::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildPaths' ])
            ->getMock();

        $swaggerBuilder = $this->getMockBuilder(Swagger::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildInfo', 'buildPaths' ])
            ->getMock();
        $swaggerBuilder->method('buildInfo')
            ->willReturn($this->createMock(InfoObject::class));
        $swaggerBuilder->method('buildPaths')
            ->willReturn($this->createMock(PathsObject::class));
        $swaggerBuilder([ 'swagger' => '2.0' ]);
    }

    public function testInvokeDoesNotSetDefinitionsIfEmpty()
    {
        $swaggerObject = $this->createMock(SwaggerObject::class);
        $swaggerObject->expects($this->never())
            ->method('setDefinitions');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Swagger')
            ->willReturn($swaggerObject);

        $swaggerBuilder = $this->getMockBuilder(Swagger::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildInfo', 'buildPaths', 'buildDefinitions' ])
            ->getMock();
        $swaggerBuilder->method('buildInfo')
            ->willReturn($this->createMock(InfoObject::class));
        $swaggerBuilder->method('buildPaths')
            ->willReturn($this->createMock(PathsObject::class));
        $swaggerBuilder([ 'swagger' => '2.0' ]);
    }

    public function testInvokeSetsDefinitionsIfNotEmpty()
    {
        $definitionsObject = $this->createMock(DefinitionsObject::class);

        $swaggerObject = $this->createMock(SwaggerObject::class);
        $swaggerObject->expects($this->once())
            ->method('setDefinitions')
            ->with($definitionsObject);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Swagger')
            ->willReturn($swaggerObject);

        $swaggerBuilder = $this->getMockBuilder(Swagger::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildDefinitions' ])
            ->getMock();
        $swaggerBuilder = $this->getMockBuilder(Swagger::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildInfo', 'buildPaths', 'buildDefinitions' ])
            ->getMock();
        $swaggerBuilder->method('buildInfo')
            ->willReturn($this->createMock(InfoObject::class));
        $swaggerBuilder->method('buildPaths')
            ->willReturn($this->createMock(PathsObject::class));
        $swaggerBuilder->method('buildDefinitions')
            ->willReturn($definitionsObject);
        $swaggerBuilder([ 'swagger' => '2.0' ]);
    }

    public function testInvokeDoesNotSetParametersIfEmpty()
    {
        $swaggerObject = $this->createMock(SwaggerObject::class);
        $swaggerObject->expects($this->never())
            ->method('setParametersDefinitions');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Swagger')
            ->willReturn($swaggerObject);

        $swaggerBuilder = $this->getMockBuilder(Swagger::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildInfo', 'buildPaths', 'buildParameters' ])
            ->getMock();
        $swaggerBuilder->method('buildInfo')
            ->willReturn($this->createMock(InfoObject::class));
        $swaggerBuilder->method('buildPaths')
            ->willReturn($this->createMock(PathsObject::class));
        $swaggerBuilder([ 'swagger' => '2.0' ]);
    }

    public function testInvokeSetsParametersIfNotEmpty()
    {
        $parametersObject = $this->createMock(ParametersDefinitionsObject::class);

        $swaggerObject = $this->createMock(SwaggerObject::class);
        $swaggerObject->expects($this->once())
            ->method('setParametersDefinitions')
            ->with($parametersObject);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Swagger')
            ->willReturn($swaggerObject);

        $swaggerBuilder = $this->getMockBuilder(Swagger::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildInfo', 'buildPaths', 'buildParameters' ])
            ->getMock();
        $swaggerBuilder->method('buildInfo')
            ->willReturn($this->createMock(InfoObject::class));
        $swaggerBuilder->method('buildPaths')
            ->willReturn($this->createMock(PathsObject::class));
        $swaggerBuilder->method('buildParameters')
            ->willReturn($parametersObject);
        $swaggerBuilder([ 'swagger' => '2.0' ]);
    }

    public function testInvokeDoesNotSetResponsesIfEmpty()
    {
        $swaggerObject = $this->createMock(SwaggerObject::class);
        $swaggerObject->expects($this->never())
            ->method('setResponsesDefinitions');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Swagger')
            ->willReturn($swaggerObject);

        $swaggerBuilder = $this->getMockBuilder(Swagger::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildInfo', 'buildPaths', 'buildResponses' ])
            ->getMock();
        $swaggerBuilder->method('buildInfo')
            ->willReturn($this->createMock(InfoObject::class));
        $swaggerBuilder->method('buildPaths')
            ->willReturn($this->createMock(PathsObject::class));
        $swaggerBuilder([ 'swagger' => '2.0' ]);
    }

    public function testInvokeSetsResponsesIfNotEmpty()
    {
        $responsesObject = $this->createMock(ResponsesDefinitionsObject::class);

        $swaggerObject = $this->createMock(SwaggerObject::class);
        $swaggerObject->expects($this->once())
            ->method('setResponsesDefinitions')
            ->with($responsesObject);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Swagger')
            ->willReturn($swaggerObject);

        $swaggerBuilder = $this->getMockBuilder(Swagger::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildInfo', 'buildPaths', 'buildResponses' ])
            ->getMock();
        $swaggerBuilder->method('buildInfo')
            ->willReturn($this->createMock(InfoObject::class));
        $swaggerBuilder->method('buildPaths')
            ->willReturn($this->createMock(PathsObject::class));
        $swaggerBuilder->method('buildResponses')
            ->willReturn($responsesObject);
        $swaggerBuilder([ 'swagger' => '2.0' ]);
    }

    public function testInvokeDoesNotSetSecurityDefinitionsIfEmpty()
    {
        $swaggerObject = $this->createMock(SwaggerObject::class);
        $swaggerObject->expects($this->never())
            ->method('setSecurityDefinitions');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Swagger')
            ->willReturn($swaggerObject);

        $swaggerBuilder = $this->getMockBuilder(Swagger::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildInfo', 'buildPaths', 'buildSecurityDefinitions' ])
            ->getMock();
        $swaggerBuilder->method('buildInfo')
            ->willReturn($this->createMock(InfoObject::class));
        $swaggerBuilder->method('buildPaths')
            ->willReturn($this->createMock(PathsObject::class));
        $swaggerBuilder([ 'swagger' => '2.0' ]);
    }

    public function testInvokeSetsSecurityDefinitionsIfNotEmpty()
    {
        $securityDefinitionsObject = $this->createMock(SecurityDefinitionsObject::class);

        $swaggerObject = $this->createMock(SwaggerObject::class);
        $swaggerObject->expects($this->once())
            ->method('setSecurityDefinitions')
            ->with($securityDefinitionsObject);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Swagger')
            ->willReturn($swaggerObject);

        $swaggerBuilder = $this->getMockBuilder(Swagger::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildInfo', 'buildPaths', 'buildSecurityDefinitions' ])
            ->getMock();
        $swaggerBuilder->method('buildInfo')
            ->willReturn($this->createMock(InfoObject::class));
        $swaggerBuilder->method('buildPaths')
            ->willReturn($this->createMock(PathsObject::class));
        $swaggerBuilder->method('buildSecurityDefinitions')
            ->willReturn($securityDefinitionsObject);
        $swaggerBuilder([ 'swagger' => '2.0' ]);
    }

    public function testInvokeDoesNotSetSecurityIfEmpty()
    {
        $swaggerObject = $this->createMock(SwaggerObject::class);
        $swaggerObject->expects($this->never())
            ->method('setSecurity');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Swagger')
            ->willReturn($swaggerObject);

        $swaggerBuilder = $this->getMockBuilder(Swagger::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildInfo', 'buildPaths', 'buildSecurityDefinitions' ])
            ->getMock();
        $swaggerBuilder->method('buildInfo')
            ->willReturn($this->createMock(InfoObject::class));
        $swaggerBuilder->method('buildPaths')
            ->willReturn($this->createMock(PathsObject::class));
        $swaggerBuilder([ 'swagger' => '2.0' ]);
    }

    public function testInvokeSetsSecurityIfNotEmpty()
    {
        $security = [ 'basic' ];

        $swaggerObject = $this->createMock(SwaggerObject::class);
        $swaggerObject->expects($this->once())
            ->method('setSecurity')
            ->with($security);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Swagger')
            ->willReturn($swaggerObject);

        $swaggerBuilder = $this->getMockBuilder(Swagger::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildInfo', 'buildPaths' ])
            ->getMock();
        $swaggerBuilder->method('buildInfo')
            ->willReturn($this->createMock(InfoObject::class));
        $swaggerBuilder->method('buildPaths')
            ->willReturn($this->createMock(PathsObject::class));
        $swaggerBuilder([
            'swagger' => '2.0',
            'security' => $security,
        ]);
    }

    public function testInvokeDoesNotSetTagsIfEmpty()
    {
        $swaggerObject = $this->createMock(SwaggerObject::class);
        $swaggerObject->expects($this->never())
            ->method('setTags');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Swagger')
            ->willReturn($swaggerObject);

        $swaggerBuilder = $this->getMockBuilder(Swagger::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildInfo', 'buildPaths' ])
            ->getMock();
        $swaggerBuilder->method('buildInfo')
            ->willReturn($this->createMock(InfoObject::class));
        $swaggerBuilder->method('buildPaths')
            ->willReturn($this->createMock(PathsObject::class));
        $swaggerBuilder([ 'swagger' => '2.0' ]);
    }

    public function testInvokeSetsTagsIfNotEmpty()
    {
        $tags = [ 'tag' ];

        $swaggerObject = $this->createMock(SwaggerObject::class);
        $swaggerObject->expects($this->once())
            ->method('setTags')
            ->with($tags);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Swagger')
            ->willReturn($swaggerObject);

        $swaggerBuilder = $this->getMockBuilder(Swagger::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildInfo', 'buildPaths' ])
            ->getMock();
        $swaggerBuilder->method('buildInfo')
            ->willReturn($this->createMock(InfoObject::class));
        $swaggerBuilder->method('buildPaths')
            ->willReturn($this->createMock(PathsObject::class));
        $swaggerBuilder([
            'swagger' => '2.0',
            'tags' => $tags,
        ]);
    }

    public function testInvokeDoesNotSetExternalDocsIfEmpty()
    {
        $swaggerObject = $this->createMock(SwaggerObject::class);
        $swaggerObject->expects($this->never())
            ->method('setExternalDocumentation');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Swagger')
            ->willReturn($swaggerObject);

        $swaggerBuilder = $this->getMockBuilder(Swagger::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildInfo', 'buildPaths', 'buildExternalDocs' ])
            ->getMock();
        $swaggerBuilder->method('buildInfo')
            ->willReturn($this->createMock(InfoObject::class));
        $swaggerBuilder->method('buildPaths')
            ->willReturn($this->createMock(PathsObject::class));
        $swaggerBuilder([ 'swagger' => '2.0' ]);
    }

    public function testInvokeSetsExternalDocsIfNotEmpty()
    {
        $externalDocsObject = $this->createMock(ExternalDocumentationObject::class);

        $swaggerObject = $this->createMock(SwaggerObject::class);
        $swaggerObject->expects($this->once())
            ->method('setExternalDocumentation')
            ->with($externalDocsObject);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Swagger')
            ->willReturn($swaggerObject);

        $swaggerBuilder = $this->getMockBuilder(Swagger::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildInfo', 'buildPaths', 'buildExternalDocs' ])
            ->getMock();
        $swaggerBuilder->method('buildInfo')
            ->willReturn($this->createMock(InfoObject::class));
        $swaggerBuilder->method('buildPaths')
            ->willReturn($this->createMock(PathsObject::class));
        $swaggerBuilder->method('buildExternalDocs')
            ->willReturn($externalDocsObject);
        $swaggerBuilder([ 'swagger' => '2.0' ]);
    }

    public function testBuildInfoReturnsNullIfEmpty()
    {
        $reflectedSwaggerBuilder = new ReflectionClass(Swagger::class);
        $reflectedBuildInfo = $reflectedSwaggerBuilder->getMethod('buildInfo');
        $reflectedBuildInfo->setAccessible(true);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);

        $swaggerBuilder = new Swagger($schemaObjectFactory);
        $result = $reflectedBuildInfo->invokeArgs($swaggerBuilder, [[]]);

        $this->assertNull($result);
    }

    public function testBuildInfoReturnsInfoIfNotEmpty()
    {
        $data = [
            'info' => [
                'name' => 'Jack Black',
            ],
        ];

        $reflectedSwaggerBuilder = new ReflectionClass(Swagger::class);
        $reflectedBuildInfo = $reflectedSwaggerBuilder->getMethod('buildInfo');
        $reflectedBuildInfo->setAccessible(true);

        $infoObject = $this->createMock(InfoObject::class);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->expects($this->once())
            ->method('newSchemaObject')
            ->with('Info', $data['info'])
            ->willReturn($infoObject);

        $swaggerBuilder = new Swagger($schemaObjectFactory);
        $result = $reflectedBuildInfo->invokeArgs($swaggerBuilder, [ $data ]);

        $this->assertSame($infoObject, $result);
    }

    public function testBuildPathsReturnsNullIfEmpty()
    {
        $reflectedSwaggerBuilder = new ReflectionClass(Swagger::class);
        $reflectedBuildPaths = $reflectedSwaggerBuilder->getMethod('buildPaths');
        $reflectedBuildPaths->setAccessible(true);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);

        $swaggerBuilder = new Swagger($schemaObjectFactory);
        $result = $reflectedBuildPaths->invokeArgs($swaggerBuilder, [[]]);

        $this->assertNull($result);
    }

    public function testBuildPathsReturnsPathsIfNotEmpty()
    {
        $data = [
            'paths' => [
                'name' => 'Jack Black',
            ],
        ];

        $reflectedSwaggerBuilder = new ReflectionClass(Swagger::class);
        $reflectedBuildPaths = $reflectedSwaggerBuilder->getMethod('buildPaths');
        $reflectedBuildPaths->setAccessible(true);

        $pathsObject = $this->createMock(PathsObject::class);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->expects($this->once())
            ->method('newSchemaObject')
            ->with('Paths', $data['paths'])
            ->willReturn($pathsObject);

        $swaggerBuilder = new Swagger($schemaObjectFactory);
        $result = $reflectedBuildPaths->invokeArgs($swaggerBuilder, [ $data ]);

        $this->assertSame($pathsObject, $result);
    }

    public function testBuildDefinitionsReturnsNullIfEmpty()
    {
        $reflectedSwaggerBuilder = new ReflectionClass(Swagger::class);
        $reflectedBuildDefinitions = $reflectedSwaggerBuilder->getMethod('buildDefinitions');
        $reflectedBuildDefinitions->setAccessible(true);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);

        $swaggerBuilder = new Swagger($schemaObjectFactory);
        $result = $reflectedBuildDefinitions->invokeArgs($swaggerBuilder, [[]]);

        $this->assertNull($result);
    }

    public function testBuildDefinitionsReturnsDefinitionsIfNotEmpty()
    {
        $data = [
            'definitions' => [
                'name' => 'Jack Black',
            ],
        ];

        $reflectedSwaggerBuilder = new ReflectionClass(Swagger::class);
        $reflectedBuildDefinitions = $reflectedSwaggerBuilder->getMethod('buildDefinitions');
        $reflectedBuildDefinitions->setAccessible(true);

        $definitionsObject = $this->createMock(DefinitionsObject::class);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->expects($this->once())
            ->method('newSchemaObject')
            ->with('Definitions', $data['definitions'])
            ->willReturn($definitionsObject);

        $swaggerBuilder = new Swagger($schemaObjectFactory);
        $result = $reflectedBuildDefinitions->invokeArgs($swaggerBuilder, [ $data ]);

        $this->assertSame($definitionsObject, $result);
    }

    public function testBuildParametersReturnsNullIfEmpty()
    {
        $reflectedSwaggerBuilder = new ReflectionClass(Swagger::class);
        $reflectedBuildParameters = $reflectedSwaggerBuilder->getMethod('buildParameters');
        $reflectedBuildParameters->setAccessible(true);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);

        $swaggerBuilder = new Swagger($schemaObjectFactory);
        $result = $reflectedBuildParameters->invokeArgs($swaggerBuilder, [[]]);

        $this->assertNull($result);
    }

    public function testBuildParametersReturnsParametersIfNotEmpty()
    {
        $data = [
            'parameters' => [
                'name' => 'Jack Black',
            ],
        ];

        $reflectedSwaggerBuilder = new ReflectionClass(Swagger::class);
        $reflectedBuildParameters = $reflectedSwaggerBuilder->getMethod('buildParameters');
        $reflectedBuildParameters->setAccessible(true);

        $parametersObject = $this->createMock(ParametersDefinitionsObject::class);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->expects($this->once())
            ->method('newSchemaObject')
            ->with('Parameters', $data['parameters'])
            ->willReturn($parametersObject);

        $swaggerBuilder = new Swagger($schemaObjectFactory);
        $result = $reflectedBuildParameters->invokeArgs($swaggerBuilder, [ $data ]);

        $this->assertSame($parametersObject, $result);
    }

    public function testBuildResponsesReturnsNullIfEmpty()
    {
        $reflectedSwaggerBuilder = new ReflectionClass(Swagger::class);
        $reflectedBuildResponses = $reflectedSwaggerBuilder->getMethod('buildResponses');
        $reflectedBuildResponses->setAccessible(true);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);

        $swaggerBuilder = new Swagger($schemaObjectFactory);
        $result = $reflectedBuildResponses->invokeArgs($swaggerBuilder, [[]]);

        $this->assertNull($result);
    }

    public function testBuildResponsesReturnsResponsesIfNotEmpty()
    {
        $data = [
            'responses' => [
                'name' => 'Jack Black',
            ],
        ];

        $reflectedSwaggerBuilder = new ReflectionClass(Swagger::class);
        $reflectedBuildResponses = $reflectedSwaggerBuilder->getMethod('buildResponses');
        $reflectedBuildResponses->setAccessible(true);

        $responsesObject = $this->createMock(ResponsesDefinitionsObject::class);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->expects($this->once())
            ->method('newSchemaObject')
            ->with('Responses', $data['responses'])
            ->willReturn($responsesObject);

        $swaggerBuilder = new Swagger($schemaObjectFactory);
        $result = $reflectedBuildResponses->invokeArgs($swaggerBuilder, [ $data ]);

        $this->assertSame($responsesObject, $result);
    }

    public function testBuildSecurityDefinitionsReturnsNullIfEmpty()
    {
        $reflectedSwaggerBuilder = new ReflectionClass(Swagger::class);
        $reflectedBuildSecurityDefinitions = $reflectedSwaggerBuilder->getMethod('buildSecurityDefinitions');
        $reflectedBuildSecurityDefinitions->setAccessible(true);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);

        $swaggerBuilder = new Swagger($schemaObjectFactory);
        $result = $reflectedBuildSecurityDefinitions->invokeArgs($swaggerBuilder, [[]]);

        $this->assertNull($result);
    }

    public function testBuildSecurityDefinitionsReturnsSecurityDefinitionsIfNotEmpty()
    {
        $data = [
            'securityDefinitions' => [
                'name' => 'Jack Black',
            ],
        ];

        $reflectedSwaggerBuilder = new ReflectionClass(Swagger::class);
        $reflectedBuildSecurityDefinitions = $reflectedSwaggerBuilder->getMethod('buildSecurityDefinitions');
        $reflectedBuildSecurityDefinitions->setAccessible(true);

        $securityDefinitionsObject = $this->createMock(SecurityDefinitionsObject::class);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->expects($this->once())
            ->method('newSchemaObject')
            ->with('SecurityDefinitions', $data['securityDefinitions'])
            ->willReturn($securityDefinitionsObject);

        $swaggerBuilder = new Swagger($schemaObjectFactory);
        $result = $reflectedBuildSecurityDefinitions->invokeArgs($swaggerBuilder, [ $data ]);

        $this->assertSame($securityDefinitionsObject, $result);
    }

    public function testBuildExternalDocsReturnsNullIfEmpty()
    {
        $reflectedSwaggerBuilder = new ReflectionClass(Swagger::class);
        $reflectedBuildExternalDocs = $reflectedSwaggerBuilder->getMethod('buildExternalDocs');
        $reflectedBuildExternalDocs->setAccessible(true);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);

        $swaggerBuilder = new Swagger($schemaObjectFactory);
        $result = $reflectedBuildExternalDocs->invokeArgs($swaggerBuilder, [[]]);

        $this->assertNull($result);
    }

    public function testBuildExternalDocsReturnsExternalDocsIfNotEmpty()
    {
        $data = [
            'externalDocs' => [
                'name' => 'Jack Black',
            ],
        ];

        $reflectedSwaggerBuilder = new ReflectionClass(Swagger::class);
        $reflectedBuildExternalDocs = $reflectedSwaggerBuilder->getMethod('buildExternalDocs');
        $reflectedBuildExternalDocs->setAccessible(true);

        $externalDocsObject = $this->createMock(ExternalDocumentationObject::class);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->expects($this->once())
            ->method('newSchemaObject')
            ->with('ExternalDocs', $data['externalDocs'])
            ->willReturn($externalDocsObject);

        $swaggerBuilder = new Swagger($schemaObjectFactory);
        $result = $reflectedBuildExternalDocs->invokeArgs($swaggerBuilder, [ $data ]);

        $this->assertSame($externalDocsObject, $result);
    }
}
