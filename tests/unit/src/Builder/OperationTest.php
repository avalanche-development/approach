<?php

namespace AvalancheDevelopment\Approach\Builder;

use AvalancheDevelopment\Approach\Schema\ExternalDocumentation as ExternalDocumentationObject;
use AvalancheDevelopment\Approach\Schema\Responses as ResponsesObject;
use AvalancheDevelopment\Approach\Schema\Operation as OperationObject;
use AvalancheDevelopment\Approach\SchemaObjectFactory;
use PHPUnit_Framework_TestCase;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use ReflectionClass;

class OperationTest extends PHPUnit_Framework_TestCase
{

    public function testOperationImplementsBuilderInterface()
    {
        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);

        $operationBuilder = new Operation($schemaObjectFactory);

        $this->assertInstanceOf(BuilderInterface::class, $operationBuilder);
    }

    public function testOperationImplementsLoggerInterface()
    {
        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);

        $operationBuilder = new Operation($schemaObjectFactory);

        $this->assertInstanceOf(LoggerAwareInterface::class, $operationBuilder);
    }

    public function testInvokeDoesNotSetTagsIfEmpty()
    {
        $operationObject = $this->createMock(OperationObject::class);
        $operationObject->expects($this->never())
            ->method('setTags');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Operation')
            ->willReturn($operationObject);

        $operationBuilder = $this->getMockBuilder(Operation::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildResponses' ])
            ->getMock();
        $operationBuilder->method('buildResponses')
            ->willReturn($this->createMock(ResponsesObject::class));
        $operationBuilder([]);
    }

    public function testInvokeSetsTagsIfNotEmpty()
    {
        $tags = [ 'Some Tag' ];

        $operationObject = $this->createMock(OperationObject::class);
        $operationObject->expects($this->once())
            ->method('setTags')
            ->with($tags);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Operation')
            ->willReturn($operationObject);

        $operationBuilder = $this->getMockBuilder(Operation::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildResponses' ])
            ->getMock();
        $operationBuilder->method('buildResponses')
            ->willReturn($this->createMock(ResponsesObject::class));
        $operationBuilder([ 'tags' => $tags ]);
    }

    public function testInvokeDoesNotSetSummaryIfEmpty()
    {
        $operationObject = $this->createMock(OperationObject::class);
        $operationObject->expects($this->never())
            ->method('setSummary');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Operation')
            ->willReturn($operationObject);

        $operationBuilder = $this->getMockBuilder(Operation::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildResponses' ])
            ->getMock();
        $operationBuilder->method('buildResponses')
            ->willReturn($this->createMock(ResponsesObject::class));
        $operationBuilder([]);
    }

    public function testInvokeSetsSummaryIfNotEmpty()
    {
        $summary = 'Summary of the Operation';

        $operationObject = $this->createMock(OperationObject::class);
        $operationObject->expects($this->once())
            ->method('setSummary')
            ->with($summary);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Operation')
            ->willReturn($operationObject);

        $operationBuilder = $this->getMockBuilder(Operation::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildResponses' ])
            ->getMock();
        $operationBuilder->method('buildResponses')
            ->willReturn($this->createMock(ResponsesObject::class));
        $operationBuilder([ 'summary' => $summary ]);
    }

    public function testInvokeDoesNotSetDescriptionIfEmpty()
    {
        $operationObject = $this->createMock(OperationObject::class);
        $operationObject->expects($this->never())
            ->method('setDescription');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Operation')
            ->willReturn($operationObject);

        $operationBuilder = $this->getMockBuilder(Operation::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildResponses' ])
            ->getMock();
        $operationBuilder->method('buildResponses')
            ->willReturn($this->createMock(ResponsesObject::class));
        $operationBuilder([]);
    }

    public function testInvokeSetsDescriptionIfNotEmpty()
    {
        $description = 'An Awesome Description';

        $operationObject = $this->createMock(OperationObject::class);
        $operationObject->expects($this->once())
            ->method('setDescription')
            ->with($description);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Operation')
            ->willReturn($operationObject);

        $operationBuilder = $this->getMockBuilder(Operation::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildResponses' ])
            ->getMock();
        $operationBuilder->method('buildResponses')
            ->willReturn($this->createMock(ResponsesObject::class));
        $operationBuilder([ 'description' => $description ]);
    }

    public function testInvokeDoesNotSetExternalDocumentationIfEmpty()
    {
        $operationObject = $this->createMock(OperationObject::class);

        $operationObject->expects($this->never())
            ->method('setExternalDocumentation');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Operation')
            ->willReturn($operationObject);

        $operationBuilder = $this->getMockBuilder(Operation::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildExternalDocumentation', 'buildResponses' ])
            ->getMock();
        $operationBuilder->method('buildResponses')
            ->willReturn($this->createMock(ResponsesObject::class));
        $operationBuilder([]);
    }

    public function testInvokeSetsExternalDocumentationIfNotEmpty()
    {
        $externalDocsObject = $this->createMock(ExternalDocumentationObject::class);

        $operationObject = $this->createMock(OperationObject::class);
        $operationObject->expects($this->once())
            ->method('setExternalDocumentation')
            ->with($externalDocsObject);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Operation')
            ->willReturn($operationObject);

        $operationBuilder = $this->getMockBuilder(Operation::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildExternalDocumentation', 'buildResponses' ])
            ->getMock();
        $operationBuilder->method('buildExternalDocumentation')
            ->willReturn($externalDocsObject);
        $operationBuilder->method('buildResponses')
            ->willReturn($this->createMock(ResponsesObject::class));
        $operationBuilder([]);
    }

    public function testInvokeDoesNotSetOperationIdIfEmpty()
    {
        $operationObject = $this->createMock(OperationObject::class);
        $operationObject->expects($this->never())
            ->method('setOperationId');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Operation')
            ->willReturn($operationObject);

        $operationBuilder = $this->getMockBuilder(Operation::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildResponses' ])
            ->getMock();
        $operationBuilder->method('buildResponses')
            ->willReturn($this->createMock(ResponsesObject::class));
        $operationBuilder([]);
    }

    public function testInvokeSetsOperationIdIfNotEmpty()
    {
        $operationId = 'someOperation';

        $operationObject = $this->createMock(OperationObject::class);
        $operationObject->expects($this->once())
            ->method('setOperationId')
            ->with($operationId);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Operation')
            ->willReturn($operationObject);

        $operationBuilder = $this->getMockBuilder(Operation::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildResponses' ])
            ->getMock();
        $operationBuilder->method('buildResponses')
            ->willReturn($this->createMock(ResponsesObject::class));
        $operationBuilder([ 'operationId' => $operationId ]);
    }

    public function testInvokeDoesNotSetConsumesIfEmpty()
    {
        $operationObject = $this->createMock(OperationObject::class);
        $operationObject->expects($this->never())
            ->method('setConsumes');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Operation')
            ->willReturn($operationObject);

        $operationBuilder = $this->getMockBuilder(Operation::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildResponses' ])
            ->getMock();
        $operationBuilder->method('buildResponses')
            ->willReturn($this->createMock(ResponsesObject::class));
        $operationBuilder([]);
    }

    public function testInvokeSetsConsumesIfNotEmpty()
    {
        $consumes = [ 'application/json' ];

        $operationObject = $this->createMock(OperationObject::class);
        $operationObject->expects($this->once())
            ->method('setConsumes')
            ->with($consumes);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Operation')
            ->willReturn($operationObject);

        $operationBuilder = $this->getMockBuilder(Operation::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildResponses' ])
            ->getMock();
        $operationBuilder->method('buildResponses')
            ->willReturn($this->createMock(ResponsesObject::class));
        $operationBuilder([ 'consumes' => $consumes ]);
    }

    public function testInvokeDoesNotSetProducesIfEmpty()
    {
        $operationObject = $this->createMock(OperationObject::class);
        $operationObject->expects($this->never())
            ->method('setProduces');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Operation')
            ->willReturn($operationObject);

        $operationBuilder = $this->getMockBuilder(Operation::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildResponses' ])
            ->getMock();
        $operationBuilder->method('buildResponses')
            ->willReturn($this->createMock(ResponsesObject::class));
        $operationBuilder([]);
    }

    public function testInvokeSetsProducesIfNotEmpty()
    {
        $produces = [ 'application/json' ];

        $operationObject = $this->createMock(OperationObject::class);
        $operationObject->expects($this->once())
            ->method('setProduces')
            ->with($produces);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Operation')
            ->willReturn($operationObject);

        $operationBuilder = $this->getMockBuilder(Operation::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildResponses' ])
            ->getMock();
        $operationBuilder->method('buildResponses')
            ->willReturn($this->createMock(ResponsesObject::class));
        $operationBuilder([ 'produces' => $produces ]);
    }

    public function testInvokeDoesNotSetParametersIfEmpty()
    {
        $operationObject = $this->createMock(OperationObject::class);
        $operationObject->expects($this->never())
            ->method('setParameters');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Operation')
            ->willReturn($operationObject);

        $operationBuilder = $this->getMockBuilder(Operation::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildResponses' ])
            ->getMock();
        $operationBuilder->method('buildResponses')
            ->willReturn($this->createMock(ResponsesObject::class));
        $operationBuilder([]);
    }

    public function testInvokeSetsParametersIfNotEmpty()
    {
        $parameters = [ 'Some Parameter' ];

        $operationObject = $this->createMock(OperationObject::class);
        $operationObject->expects($this->once())
            ->method('setParameters')
            ->with($parameters);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Operation')
            ->willReturn($operationObject);

        $operationBuilder = $this->getMockBuilder(Operation::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildResponses' ])
            ->getMock();
        $operationBuilder->method('buildResponses')
            ->willReturn($this->createMock(ResponsesObject::class));
        $operationBuilder([ 'parameters' => $parameters ]);
    }

    public function testInvokeDoesNotSetResponsesIfEmpty()
    {
        $operationObject = $this->createMock(OperationObject::class);

        $operationObject->expects($this->never())
            ->method('setResponses');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Operation')
            ->willReturn($operationObject);

        $operationBuilder = $this->getMockBuilder(Operation::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildResponses' ])
            ->getMock();
        $operationBuilder([]);
    }

    public function testInvokeSetsResponsesIfNotEmpty()
    {
        $responsesObject = $this->createMock(ResponsesObject::class);

        $operationObject = $this->createMock(OperationObject::class);
        $operationObject->expects($this->once())
            ->method('setResponses')
            ->with($responsesObject);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Operation')
            ->willReturn($operationObject);

        $operationBuilder = $this->getMockBuilder(Operation::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildResponses' ])
            ->getMock();
        $operationBuilder->method('buildResponses')
            ->willReturn($responsesObject);
        $operationBuilder([]);
    }

    public function testInvokeDoesNotSetSchemesIfEmpty()
    {
        $operationObject = $this->createMock(OperationObject::class);
        $operationObject->expects($this->never())
            ->method('setSchemes');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Operation')
            ->willReturn($operationObject);

        $operationBuilder = $this->getMockBuilder(Operation::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildResponses' ])
            ->getMock();
        $operationBuilder->method('buildResponses')
            ->willReturn($this->createMock(ResponsesObject::class));
        $operationBuilder([]);
    }

    public function testInvokeSetsSchemesIfNotEmpty()
    {
        $schemes = [ 'http' ];

        $operationObject = $this->createMock(OperationObject::class);
        $operationObject->expects($this->once())
            ->method('setSchemes')
            ->with($schemes);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Operation')
            ->willReturn($operationObject);

        $operationBuilder = $this->getMockBuilder(Operation::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildResponses' ])
            ->getMock();
        $operationBuilder->method('buildResponses')
            ->willReturn($this->createMock(ResponsesObject::class));
        $operationBuilder([ 'schemes' => $schemes ]);
    }

    public function testInvokeDoesNotSetDeprecatedIfEmpty()
    {
        $operationObject = $this->createMock(OperationObject::class);
        $operationObject->expects($this->never())
            ->method('setDeprecated');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Operation')
            ->willReturn($operationObject);

        $operationBuilder = $this->getMockBuilder(Operation::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildResponses' ])
            ->getMock();
        $operationBuilder->method('buildResponses')
            ->willReturn($this->createMock(ResponsesObject::class));
        $operationBuilder([]);
    }

    public function testInvokeSetsDeprecatedIfNotEmpty()
    {
        $deprecated = false;

        $operationObject = $this->createMock(OperationObject::class);
        $operationObject->expects($this->once())
            ->method('setDeprecated')
            ->with($deprecated);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Operation')
            ->willReturn($operationObject);

        $operationBuilder = $this->getMockBuilder(Operation::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildResponses' ])
            ->getMock();
        $operationBuilder->method('buildResponses')
            ->willReturn($this->createMock(ResponsesObject::class));
        $operationBuilder([ 'deprecated' => $deprecated ]);
    }

    public function testInvokeDoesNotSetSecurityIfEmpty()
    {
        $operationObject = $this->createMock(OperationObject::class);
        $operationObject->expects($this->never())
            ->method('setSecurity');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Operation')
            ->willReturn($operationObject);

        $operationBuilder = $this->getMockBuilder(Operation::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildResponses' ])
            ->getMock();
        $operationBuilder->method('buildResponses')
            ->willReturn($this->createMock(ResponsesObject::class));
        $operationBuilder([]);
    }

    public function testInvokeSetsSecurityIfNotEmpty()
    {
        $security = [ 'basicAuth' ];

        $operationObject = $this->createMock(OperationObject::class);
        $operationObject->expects($this->once())
            ->method('setSecurity')
            ->with($security);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Operation')
            ->willReturn($operationObject);

        $operationBuilder = $this->getMockBuilder(Operation::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildResponses' ])
            ->getMock();
        $operationBuilder->method('buildResponses')
            ->willReturn($this->createMock(ResponsesObject::class));
        $operationBuilder([ 'security' => $security ]);
    }

    public function testBuildExternalDocumentationReturnsNullIfEmpty()
    {
        $reflectedOperationBuilder = new ReflectionClass(Operation::class);
        $reflectedBuildExternalDocumentation = $reflectedOperationBuilder->getMethod('buildExternalDocumentation');
        $reflectedBuildExternalDocumentation->setAccessible(true);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);

        $operationBuilder = new Operation($schemaObjectFactory);
        $result = $reflectedBuildExternalDocumentation->invokeArgs($operationBuilder, [[]]);

        $this->assertNull($result);
    }

    public function testBuildExternalDocumentationReturnsExternalDocumentationIfNotEmpty()
    {
        $data = [
            'externalDocs' => [
                'name' => 'Jack Black',
            ],
        ];

        $reflectedOperationBuilder = new ReflectionClass(Operation::class);
        $reflectedBuildExternalDocumentation = $reflectedOperationBuilder->getMethod('buildExternalDocumentation');
        $reflectedBuildExternalDocumentation->setAccessible(true);

        $externalDocsObject = $this->createMock(ExternalDocumentationObject::class);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->expects($this->once())
            ->method('newSchemaObject')
            ->with('ExternalDocumentation', $data['externalDocs'])
            ->willReturn($externalDocsObject);

        $operationBuilder = new Operation($schemaObjectFactory);
        $result = $reflectedBuildExternalDocumentation->invokeArgs($operationBuilder, [ $data ]);

        $this->assertSame($externalDocsObject, $result);
    }

    public function testBuildResponsesReturnsNullIfEmpty()
    {
        $reflectedOperationBuilder = new ReflectionClass(Operation::class);
        $reflectedBuildResponses = $reflectedOperationBuilder->getMethod('buildResponses');
        $reflectedBuildResponses->setAccessible(true);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);

        $operationBuilder = new Operation($schemaObjectFactory);
        $result = $reflectedBuildResponses->invokeArgs($operationBuilder, [[]]);

        $this->assertNull($result);
    }

    public function testBuildResponsesReturnsResponsesIfNotEmpty()
    {
        $data = [
            'responses' => [
                'name' => 'Jack Black',
            ],
        ];

        $reflectedOperationBuilder = new ReflectionClass(Operation::class);
        $reflectedBuildResponses = $reflectedOperationBuilder->getMethod('buildResponses');
        $reflectedBuildResponses->setAccessible(true);

        $responsesObject = $this->createMock(ResponsesObject::class);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->expects($this->once())
            ->method('newSchemaObject')
            ->with('Responses', $data['responses'])
            ->willReturn($responsesObject);

        $operationBuilder = new Operation($schemaObjectFactory);
        $result = $reflectedBuildResponses->invokeArgs($operationBuilder, [ $data ]);

        $this->assertSame($responsesObject, $result);
    }
}
