<?php

namespace AvalancheDevelopment\Approach\Builder;

use AvalancheDevelopment\Approach\Schema\Items as ItemsObject;
use AvalancheDevelopment\Approach\Schema\Header as HeaderObject;
use AvalancheDevelopment\Approach\SchemaObjectFactory;
use PHPUnit_Framework_TestCase;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use ReflectionClass;

class HeaderTest extends PHPUnit_Framework_TestCase
{

    public function testHeaderImplementsBuilderInterface()
    {
        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);

        $headerBuilder = new Header($schemaObjectFactory);

        $this->assertInstanceOf(BuilderInterface::class, $headerBuilder);
    }

    public function testHeaderImplementsLoggerInterface()
    {
        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);

        $headerBuilder = new Header($schemaObjectFactory);

        $this->assertInstanceOf(LoggerAwareInterface::class, $headerBuilder);
    }

    public function testInvokeBailsIfTypeIsEmpty()
    {
        $logger = $this->createMock(LoggerInterface::class);
        $logger->expects($this->once())
            ->method('warning')
            ->with('Could not build Header object - missing type');

        $headerObject = $this->createMock(HeaderObject::class);
        $headerObject->expects($this->never())
            ->method('setType');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Header')
            ->willReturn($headerObject);

        $headerBuilder = new Header($schemaObjectFactory);
        $headerBuilder->setLogger($logger);
        $headerBuilder([]);
    }

    public function testInvokeDoesNotSetDescriptionIfEmpty()
    {
        $headerObject = $this->createMock(HeaderObject::class);
        $headerObject->expects($this->never())
            ->method('setDescription');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Header')
            ->willReturn($headerObject);

        $headerBuilder = new Header($schemaObjectFactory);
        $headerBuilder([ 'type' => 'string' ]);
    }

    public function testInvokeSetsDescriptionIfNotEmpty()
    {
        $description = 'An Awesome Parameter';

        $headerObject = $this->createMock(HeaderObject::class);
        $headerObject->expects($this->once())
            ->method('setDescription')
            ->with($description);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Header')
            ->willReturn($headerObject);

        $headerBuilder = new Header($schemaObjectFactory);
        $headerBuilder([
            'description' => $description,
            'type' => 'string',
        ]);
    }

    public function testInvokeSetsTypeIfNotEmpty()
    {
        $type = 'string';

        $headerObject = $this->createMock(HeaderObject::class);
        $headerObject->expects($this->once())
            ->method('setType')
            ->with($type);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Header')
            ->willReturn($headerObject);

        $headerBuilder = new Header($schemaObjectFactory);
        $headerBuilder([ 'type' => $type ]);
    }

    public function testInvokeDoesNotSetFormatIfEmpty()
    {
        $headerObject = $this->createMock(HeaderObject::class);
        $headerObject->expects($this->never())
            ->method('setFormat');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Header')
            ->willReturn($headerObject);

        $headerBuilder = new Header($schemaObjectFactory);
        $headerBuilder([ 'type' => 'string' ]);
    }

    public function testInvokeSetsFormatIfNotEmpty()
    {
        $format = 'datetime';

        $headerObject = $this->createMock(HeaderObject::class);
        $headerObject->expects($this->once())
            ->method('setFormat')
            ->with($format);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Header')
            ->willReturn($headerObject);

        $headerBuilder = new Header($schemaObjectFactory);
        $headerBuilder([
            'format' => $format,
            'type' => 'string',
        ]);
    }

    public function testInvokeDoesNotSetItemsIfEmpty()
    {
        $headerObject = $this->createMock(HeaderObject::class);

        $headerObject->expects($this->never())
            ->method('setItems');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Header')
            ->willReturn($headerObject);

        $headerBuilder = $this->getMockBuilder(Header::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildItems' ])
            ->getMock();

        $headerBuilder([ 'type' => 'string' ]);
    }

    public function testInvokeSetsItemsIfNotEmpty()
    {
        $itemsObject = $this->createMock(ItemsObject::class);

        $headerObject = $this->createMock(HeaderObject::class);
        $headerObject->expects($this->once())
            ->method('setItems')
            ->with($itemsObject);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Header')
            ->willReturn($headerObject);

        $headerBuilder = $this->getMockBuilder(Header::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildItems' ])
            ->getMock();

        $headerBuilder->method('buildItems')
            ->willReturn($itemsObject);

        $headerBuilder([ 'type' => 'string' ]);
    }

    public function testInvokeDoesNotSetCollectionFormatIfEmpty()
    {
        $headerObject = $this->createMock(HeaderObject::class);
        $headerObject->expects($this->never())
            ->method('setCollectionFormat');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Header')
            ->willReturn($headerObject);

        $headerBuilder = new Header($schemaObjectFactory);
        $headerBuilder([ 'type' => 'string' ]);
    }

    public function testInvokeSetsCollectionFormatIfNotEmpty()
    {
        $collectionFormat = 'csv';

        $headerObject = $this->createMock(HeaderObject::class);
        $headerObject->expects($this->once())
            ->method('setCollectionFormat')
            ->with($collectionFormat);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Header')
            ->willReturn($headerObject);

        $headerBuilder = new Header($schemaObjectFactory);
        $headerBuilder([
            'collectionFormat' => $collectionFormat,
            'type' => 'string',
        ]);
    }

    public function testInvokeDoesNotSetDefaultIfEmpty()
    {
        $headerObject = $this->createMock(HeaderObject::class);
        $headerObject->expects($this->never())
            ->method('setDefault');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Header')
            ->willReturn($headerObject);

        $headerBuilder = new Header($schemaObjectFactory);
        $headerBuilder([ 'type' => 'string' ]);
    }

    public function testInvokeSetsDefaultIfNotEmpty()
    {
        $default = 'Some Value';

        $headerObject = $this->createMock(HeaderObject::class);
        $headerObject->expects($this->once())
            ->method('setDefault')
            ->with($default);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Header')
            ->willReturn($headerObject);

        $headerBuilder = new Header($schemaObjectFactory);
        $headerBuilder([
            'default' => $default,
            'type' => 'string',
        ]);
    }

    public function testInvokeDoesNotSetMaximumIfEmpty()
    {
        $headerObject = $this->createMock(HeaderObject::class);
        $headerObject->expects($this->never())
            ->method('setMaximum');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Header')
            ->willReturn($headerObject);

        $headerBuilder = new Header($schemaObjectFactory);
        $headerBuilder([ 'type' => 'string' ]);
    }

    public function testInvokeSetsMaximumIfNotEmpty()
    {
        $maximum = 10;

        $headerObject = $this->createMock(HeaderObject::class);
        $headerObject->expects($this->once())
            ->method('setMaximum')
            ->with($maximum);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Header')
            ->willReturn($headerObject);

        $headerBuilder = new Header($schemaObjectFactory);
        $headerBuilder([
            'maximum' => $maximum,
            'type' => 'string',
        ]);
    }

    public function testInvokeDoesNotSetExclusiveMaximumIfEmpty()
    {
        $headerObject = $this->createMock(HeaderObject::class);
        $headerObject->expects($this->never())
            ->method('setExclusiveMaximum');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Header')
            ->willReturn($headerObject);

        $headerBuilder = new Header($schemaObjectFactory);
        $headerBuilder([ 'type' => 'string' ]);
    }

    public function testInvokeSetsExclusiveMaximumIfNotEmpty()
    {
        $exclusiveMaximum = true;

        $headerObject = $this->createMock(HeaderObject::class);
        $headerObject->expects($this->once())
            ->method('setExclusiveMaximum')
            ->with($exclusiveMaximum);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Header')
            ->willReturn($headerObject);

        $headerBuilder = new Header($schemaObjectFactory);
        $headerBuilder([
            'exclusiveMaximum' => $exclusiveMaximum,
            'type' => 'string',
        ]);
    }

    public function testInvokeDoesNotSetMinimumIfEmpty()
    {
        $headerObject = $this->createMock(HeaderObject::class);
        $headerObject->expects($this->never())
            ->method('setMinimum');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Header')
            ->willReturn($headerObject);

        $headerBuilder = new Header($schemaObjectFactory);
        $headerBuilder([ 'type' => 'string' ]);
    }

    public function testInvokeSetsMinimumIfNotEmpty()
    {
        $minimum = 5;

        $headerObject = $this->createMock(HeaderObject::class);
        $headerObject->expects($this->once())
            ->method('setMinimum')
            ->with($minimum);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Header')
            ->willReturn($headerObject);

        $headerBuilder = new Header($schemaObjectFactory);
        $headerBuilder([
            'minimum' => $minimum,
            'type' => 'string',
        ]);
    }

    public function testInvokeDoesNotSetExclusiveMinimumIfEmpty()
    {
        $headerObject = $this->createMock(HeaderObject::class);
        $headerObject->expects($this->never())
            ->method('setExclusiveMinimum');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Header')
            ->willReturn($headerObject);

        $headerBuilder = new Header($schemaObjectFactory);
        $headerBuilder([ 'type' => 'string' ]);
    }

    public function testInvokeSetsExclusiveMinimumIfNotEmpty()
    {
        $exclusiveMinimum = false;

        $headerObject = $this->createMock(HeaderObject::class);
        $headerObject->expects($this->once())
            ->method('setExclusiveMinimum')
            ->with($exclusiveMinimum);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Header')
            ->willReturn($headerObject);

        $headerBuilder = new Header($schemaObjectFactory);
        $headerBuilder([
            'exclusiveMinimum' => $exclusiveMinimum,
            'type' => 'string',
        ]);
    }

    public function testInvokeDoesNotSetMaxLengthIfEmpty()
    {
        $headerObject = $this->createMock(HeaderObject::class);
        $headerObject->expects($this->never())
            ->method('setMaxLength');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Header')
            ->willReturn($headerObject);

        $headerBuilder = new Header($schemaObjectFactory);
        $headerBuilder([ 'type' => 'string' ]);
    }

    public function testInvokeSetsMaxLengthIfNotEmpty()
    {
        $maxLength = 30;

        $headerObject = $this->createMock(HeaderObject::class);
        $headerObject->expects($this->once())
            ->method('setMaxLength')
            ->with($maxLength);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Header')
            ->willReturn($headerObject);

        $headerBuilder = new Header($schemaObjectFactory);
        $headerBuilder([
            'maxLength' => $maxLength,
            'type' => 'string',
        ]);
    }

    public function testInvokeDoesNotSetMinLengthIfEmpty()
    {
        $headerObject = $this->createMock(HeaderObject::class);
        $headerObject->expects($this->never())
            ->method('setMinLength');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Header')
            ->willReturn($headerObject);

        $headerBuilder = new Header($schemaObjectFactory);
        $headerBuilder([ 'type' => 'string' ]);
    }

    public function testInvokeSetsMinLengthIfNotEmpty()
    {
        $minLength = 1;

        $headerObject = $this->createMock(HeaderObject::class);
        $headerObject->expects($this->once())
            ->method('setMinLength')
            ->with($minLength);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Header')
            ->willReturn($headerObject);

        $headerBuilder = new Header($schemaObjectFactory);
        $headerBuilder([
            'minLength' => $minLength,
            'type' => 'string',
        ]);
    }

    public function testInvokeDoesNotSetPatternIfEmpty()
    {
        $headerObject = $this->createMock(HeaderObject::class);
        $headerObject->expects($this->never())
            ->method('setPattern');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Header')
            ->willReturn($headerObject);

        $headerBuilder = new Header($schemaObjectFactory);
        $headerBuilder([ 'type' => 'string' ]);
    }

    public function testInvokeSetsPatternIfNotEmpty()
    {
        $pattern = 'Some pattern';

        $headerObject = $this->createMock(HeaderObject::class);
        $headerObject->expects($this->once())
            ->method('setPattern')
            ->with($pattern);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Header')
            ->willReturn($headerObject);

        $headerBuilder = new Header($schemaObjectFactory);
        $headerBuilder([
            'pattern' => $pattern,
            'type' => 'string',
        ]);
    }

    public function testInvokeDoesNotSetMaxItemsIfEmpty()
    {
        $headerObject = $this->createMock(HeaderObject::class);
        $headerObject->expects($this->never())
            ->method('setMaxItems');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Header')
            ->willReturn($headerObject);

        $headerBuilder = new Header($schemaObjectFactory);
        $headerBuilder([ 'type' => 'string' ]);
    }

    public function testInvokeSetsMaxItemsIfNotEmpty()
    {
        $maxItems = 5;

        $headerObject = $this->createMock(HeaderObject::class);
        $headerObject->expects($this->once())
            ->method('setMaxItems')
            ->with($maxItems);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Header')
            ->willReturn($headerObject);

        $headerBuilder = new Header($schemaObjectFactory);
        $headerBuilder([
            'maxItems' => $maxItems,
            'type' => 'string',
        ]);
    }

    public function testInvokeDoesNotSetMinItemsIfEmpty()
    {
        $headerObject = $this->createMock(HeaderObject::class);
        $headerObject->expects($this->never())
            ->method('setMinItems');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Header')
            ->willReturn($headerObject);

        $headerBuilder = new Header($schemaObjectFactory);
        $headerBuilder([ 'type' => 'string' ]);
    }

    public function testInvokeSetsMinItemsIfNotEmpty()
    {
        $minItems = 1;

        $headerObject = $this->createMock(HeaderObject::class);
        $headerObject->expects($this->once())
            ->method('setMinItems')
            ->with($minItems);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Header')
            ->willReturn($headerObject);

        $headerBuilder = new Header($schemaObjectFactory);
        $headerBuilder([
            'minItems' => $minItems,
            'type' => 'string',
        ]);
    }

    public function testInvokeDoesNotSetUniqueItemsIfEmpty()
    {
        $headerObject = $this->createMock(HeaderObject::class);
        $headerObject->expects($this->never())
            ->method('setUniqueItems');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Header')
            ->willReturn($headerObject);

        $headerBuilder = new Header($schemaObjectFactory);
        $headerBuilder([ 'type' => 'string' ]);
    }

    public function testInvokeSetsUniqueItemsIfNotEmpty()
    {
        $uniqueItems = true;

        $headerObject = $this->createMock(HeaderObject::class);
        $headerObject->expects($this->once())
            ->method('setUniqueItems')
            ->with($uniqueItems);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Header')
            ->willReturn($headerObject);

        $headerBuilder = new Header($schemaObjectFactory);
        $headerBuilder([
            'uniqueItems' => $uniqueItems,
            'type' => 'string',
        ]);
    }

    public function testInvokeDoesNotSetEnumIfEmpty()
    {
        $headerObject = $this->createMock(HeaderObject::class);
        $headerObject->expects($this->never())
            ->method('setEnum');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Header')
            ->willReturn($headerObject);

        $headerBuilder = new Header($schemaObjectFactory);
        $headerBuilder([ 'type' => 'string' ]);
    }

    public function testInvokeSetsEnumIfNotEmpty()
    {
        $enum = [
            'option 1',
            'option 2',
        ];

        $headerObject = $this->createMock(HeaderObject::class);
        $headerObject->expects($this->once())
            ->method('setEnum')
            ->with($enum);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Header')
            ->willReturn($headerObject);

        $headerBuilder = new Header($schemaObjectFactory);
        $headerBuilder([
            'enum' => $enum,
            'type' => 'string',
        ]);
    }

    public function testInvokeDoesNotSetMultipleOfIfEmpty()
    {
        $headerObject = $this->createMock(HeaderObject::class);
        $headerObject->expects($this->never())
            ->method('setMultipleOf');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Header')
            ->willReturn($headerObject);

        $headerBuilder = new Header($schemaObjectFactory);
        $headerBuilder([ 'type' => 'string' ]);
    }

    public function testInvokeSetsMultipleOfIfNotEmpty()
    {
        $multipleOf = 2;

        $headerObject = $this->createMock(HeaderObject::class);
        $headerObject->expects($this->once())
            ->method('setMultipleOf')
            ->with($multipleOf);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Header')
            ->willReturn($headerObject);

        $headerBuilder = new Header($schemaObjectFactory);
        $headerBuilder([
            'multipleOf' => $multipleOf,
            'type' => 'string',
        ]);
    }

    public function testBuildItemsReturnsNullIfEmpty()
    {
        $reflectedHeaderBuilder = new ReflectionClass(Header::class);
        $reflectedBuildItems = $reflectedHeaderBuilder->getMethod('buildItems');
        $reflectedBuildItems->setAccessible(true);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);

        $headerBuilder = new Header($schemaObjectFactory);
        $result = $reflectedBuildItems->invokeArgs($headerBuilder, [[]]);

        $this->assertNull($result);
    }

    public function testBuildItemsReturnsItemsIfNotEmpty()
    {
        $data = [
            'items' => [
                'type' => 'string',
            ],
        ];

        $reflectedHeaderBuilder = new ReflectionClass(Header::class);
        $reflectedBuildItems = $reflectedHeaderBuilder->getMethod('buildItems');
        $reflectedBuildItems->setAccessible(true);

        $itemsObject = $this->createMock(ItemsObject::class);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->expects($this->once())
            ->method('newSchemaObject')
            ->with('Items', $data['items'])
            ->willReturn($itemsObject);

        $headerBuilder = new Header($schemaObjectFactory);
        $result = $reflectedBuildItems->invokeArgs($headerBuilder, [ $data ]);

        $this->assertSame($itemsObject, $result);
    }
}
