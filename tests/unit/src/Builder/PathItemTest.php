<?php

namespace AvalancheDevelopment\Approach\Builder;

use AvalancheDevelopment\Approach\Schema\Operation as OperationObject;
use AvalancheDevelopment\Approach\Schema\PathItem as PathItemObject;
use AvalancheDevelopment\Approach\SchemaObjectFactory;
use PHPUnit_Framework_TestCase;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use ReflectionClass;

class PathItemTest extends PHPUnit_Framework_TestCase
{

    public function testPathItemImplementsBuilderInterface()
    {
        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);

        $pathItemBuilder = new PathItem($schemaObjectFactory);

        $this->assertInstanceOf(BuilderInterface::class, $pathItemBuilder);
    }

    public function testPathItemImplementsLoggerInterface()
    {
        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);

        $pathItemBuilder = new PathItem($schemaObjectFactory);

        $this->assertInstanceOf(LoggerAwareInterface::class, $pathItemBuilder);
    }

    public function testInvokeDoesNotSetGetIfEmpty()
    {
        $pathItemObject = $this->createMock(PathItemObject::class);
        $pathItemObject->expects($this->never())
            ->method('setGet');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('PathItem')
            ->willReturn($pathItemObject);

        $pathItemBuilder = $this->getMockBuilder(PathItem::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildGet' ])
            ->getMock();

        $pathItemBuilder([]);
    }

    public function testInvokeSetsGetIfNotEmpty()
    {
        $getObject = $this->createMock(OperationObject::class);

        $pathItemObject = $this->createMock(PathItemObject::class);
        $pathItemObject->expects($this->once())
            ->method('setGet')
            ->with($getObject);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('PathItem')
            ->willReturn($pathItemObject);

        $pathItemBuilder = $this->getMockBuilder(PathItem::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildGet' ])
            ->getMock();

        $pathItemBuilder->method('buildGet')
            ->willReturn($getObject);

        $pathItemBuilder([]);
    }

    public function testInvokeDoesNotSetPutIfEmpty()
    {
        $pathItemObject = $this->createMock(PathItemObject::class);
        $pathItemObject->expects($this->never())
            ->method('setPut');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('PathItem')
            ->willReturn($pathItemObject);

        $pathItemBuilder = $this->getMockBuilder(PathItem::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildPut' ])
            ->getMock();

        $pathItemBuilder([]);
    }

    public function testInvokeSetsPutIfNotEmpty()
    {
        $putObject = $this->createMock(OperationObject::class);

        $pathItemObject = $this->createMock(PathItemObject::class);
        $pathItemObject->expects($this->once())
            ->method('setPut')
            ->with($putObject);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('PathItem')
            ->willReturn($pathItemObject);

        $pathItemBuilder = $this->getMockBuilder(PathItem::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildPut' ])
            ->getMock();

        $pathItemBuilder->method('buildPut')
            ->willReturn($putObject);

        $pathItemBuilder([]);
    }

    public function testInvokeDoesNotSetPostIfEmpty()
    {
        $pathItemObject = $this->createMock(PathItemObject::class);
        $pathItemObject->expects($this->never())
            ->method('setPost');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('PathItem')
            ->willReturn($pathItemObject);

        $pathItemBuilder = $this->getMockBuilder(PathItem::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildPost' ])
            ->getMock();

        $pathItemBuilder([]);
    }

    public function testInvokeSetsPostIfNotEmpty()
    {
        $postObject = $this->createMock(OperationObject::class);

        $pathItemObject = $this->createMock(PathItemObject::class);
        $pathItemObject->expects($this->once())
            ->method('setPost')
            ->with($postObject);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('PathItem')
            ->willReturn($pathItemObject);

        $pathItemBuilder = $this->getMockBuilder(PathItem::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildPost' ])
            ->getMock();

        $pathItemBuilder->method('buildPost')
            ->willReturn($postObject);

        $pathItemBuilder([]);
    }

    public function testInvokeDoesNotSetDeleteIfEmpty()
    {
        $pathItemObject = $this->createMock(PathItemObject::class);
        $pathItemObject->expects($this->never())
            ->method('setDelete');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('PathItem')
            ->willReturn($pathItemObject);

        $pathItemBuilder = $this->getMockBuilder(PathItem::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildDelete' ])
            ->getMock();

        $pathItemBuilder([]);
    }

    public function testInvokeSetsDeleteIfNotEmpty()
    {
        $deleteObject = $this->createMock(OperationObject::class);

        $pathItemObject = $this->createMock(PathItemObject::class);
        $pathItemObject->expects($this->once())
            ->method('setDelete')
            ->with($deleteObject);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('PathItem')
            ->willReturn($pathItemObject);

        $pathItemBuilder = $this->getMockBuilder(PathItem::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildDelete' ])
            ->getMock();

        $pathItemBuilder->method('buildDelete')
            ->willReturn($deleteObject);

        $pathItemBuilder([]);
    }

    public function testInvokeDoesNotSetOptionsIfEmpty()
    {
        $pathItemObject = $this->createMock(PathItemObject::class);
        $pathItemObject->expects($this->never())
            ->method('setOptions');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('PathItem')
            ->willReturn($pathItemObject);

        $pathItemBuilder = $this->getMockBuilder(PathItem::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildOptions' ])
            ->getMock();

        $pathItemBuilder([]);
    }

    public function testInvokeSetsOptionsIfNotEmpty()
    {
        $optionsObject = $this->createMock(OperationObject::class);

        $pathItemObject = $this->createMock(PathItemObject::class);
        $pathItemObject->expects($this->once())
            ->method('setOptions')
            ->with($optionsObject);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('PathItem')
            ->willReturn($pathItemObject);

        $pathItemBuilder = $this->getMockBuilder(PathItem::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildOptions' ])
            ->getMock();

        $pathItemBuilder->method('buildOptions')
            ->willReturn($optionsObject);

        $pathItemBuilder([]);
    }

    public function testInvokeDoesNotSetHeadIfEmpty()
    {
        $pathItemObject = $this->createMock(PathItemObject::class);
        $pathItemObject->expects($this->never())
            ->method('setHead');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('PathItem')
            ->willReturn($pathItemObject);

        $pathItemBuilder = $this->getMockBuilder(PathItem::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildHead' ])
            ->getMock();

        $pathItemBuilder([]);
    }

    public function testInvokeSetsHeadIfNotEmpty()
    {
        $headObject = $this->createMock(OperationObject::class);

        $pathItemObject = $this->createMock(PathItemObject::class);
        $pathItemObject->expects($this->once())
            ->method('setHead')
            ->with($headObject);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('PathItem')
            ->willReturn($pathItemObject);

        $pathItemBuilder = $this->getMockBuilder(PathItem::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildHead' ])
            ->getMock();

        $pathItemBuilder->method('buildHead')
            ->willReturn($headObject);

        $pathItemBuilder([]);
    }

    public function testInvokeDoesNotSetPatchIfEmpty()
    {
        $pathItemObject = $this->createMock(PathItemObject::class);
        $pathItemObject->expects($this->never())
            ->method('setPatch');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('PathItem')
            ->willReturn($pathItemObject);

        $pathItemBuilder = $this->getMockBuilder(PathItem::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildPatch' ])
            ->getMock();

        $pathItemBuilder([]);
    }

    public function testInvokeSetsPatchIfNotEmpty()
    {
        $patchObject = $this->createMock(OperationObject::class);

        $pathItemObject = $this->createMock(PathItemObject::class);
        $pathItemObject->expects($this->once())
            ->method('setPatch')
            ->with($patchObject);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('PathItem')
            ->willReturn($pathItemObject);

        $pathItemBuilder = $this->getMockBuilder(PathItem::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildPatch' ])
            ->getMock();

        $pathItemBuilder->method('buildPatch')
            ->willReturn($patchObject);

        $pathItemBuilder([]);
    }

    public function testInvokeDoesNotSetParametersIfEmpty()
    {
        $pathItemObject = $this->createMock(PathItemObject::class);
        $pathItemObject->expects($this->never())
            ->method('setParameters');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('PathItem')
            ->willReturn($pathItemObject);

        $pathItemBuilder = new PathItem($schemaObjectFactory);
        $pathItemBuilder([]);
    }

    public function testInvokeSetsParametersIfNotEmpty()
    {
        $parameters = [
            'An Awesome Parameter',
        ];

        $pathItemObject = $this->createMock(PathItemObject::class);
        $pathItemObject->expects($this->once())
            ->method('setParameters')
            ->with($parameters);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('PathItem')
            ->willReturn($pathItemObject);

        $pathItemBuilder = new PathItem($schemaObjectFactory);
        $pathItemBuilder([ 'parameters' => $parameters ]);
    }

    public function testBuildGetReturnsNullIfEmpty()
    {
        $reflectedPathItemBuilder = new ReflectionClass(PathItem::class);
        $reflectedBuildGet = $reflectedPathItemBuilder->getMethod('buildGet');
        $reflectedBuildGet->setAccessible(true);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);

        $pathItemBuilder = new PathItem($schemaObjectFactory);
        $result = $reflectedBuildGet->invokeArgs($pathItemBuilder, [[]]);

        $this->assertNull($result);
    }

    public function testBuildGetReturnsGetIfNotEmpty()
    {
        $data = [
            'get' => [
                'summary' => 'Some Operation',
            ],
        ];

        $reflectedPathItemBuilder = new ReflectionClass(PathItem::class);
        $reflectedBuildGet = $reflectedPathItemBuilder->getMethod('buildGet');
        $reflectedBuildGet->setAccessible(true);

        $getObject = $this->createMock(OperationObject::class);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->expects($this->once())
            ->method('newSchemaObject')
            ->with('Operation', $data['get'])
            ->willReturn($getObject);

        $pathItemBuilder = new PathItem($schemaObjectFactory);
        $result = $reflectedBuildGet->invokeArgs($pathItemBuilder, [ $data ]);

        $this->assertSame($getObject, $result);
    }

    public function testBuildPutReturnsNullIfEmpty()
    {
        $reflectedPathItemBuilder = new ReflectionClass(PathItem::class);
        $reflectedBuildPut = $reflectedPathItemBuilder->getMethod('buildPut');
        $reflectedBuildPut->setAccessible(true);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);

        $pathItemBuilder = new PathItem($schemaObjectFactory);
        $result = $reflectedBuildPut->invokeArgs($pathItemBuilder, [[]]);

        $this->assertNull($result);
    }

    public function testBuildPutReturnsPutIfNotEmpty()
    {
        $data = [
            'put' => [
                'summary' => 'Some Operation',
            ],
        ];

        $reflectedPathItemBuilder = new ReflectionClass(PathItem::class);
        $reflectedBuildPut = $reflectedPathItemBuilder->getMethod('buildPut');
        $reflectedBuildPut->setAccessible(true);

        $putObject = $this->createMock(OperationObject::class);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->expects($this->once())
            ->method('newSchemaObject')
            ->with('Operation', $data['put'])
            ->willReturn($putObject);

        $pathItemBuilder = new PathItem($schemaObjectFactory);
        $result = $reflectedBuildPut->invokeArgs($pathItemBuilder, [ $data ]);

        $this->assertSame($putObject, $result);
    }

    public function testBuildPostReturnsNullIfEmpty()
    {
        $reflectedPathItemBuilder = new ReflectionClass(PathItem::class);
        $reflectedBuildPost = $reflectedPathItemBuilder->getMethod('buildPost');
        $reflectedBuildPost->setAccessible(true);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);

        $pathItemBuilder = new PathItem($schemaObjectFactory);
        $result = $reflectedBuildPost->invokeArgs($pathItemBuilder, [[]]);

        $this->assertNull($result);
    }

    public function testBuildPostReturnsPostIfNotEmpty()
    {
        $data = [
            'post' => [
                'summary' => 'Some Operation',
            ],
        ];

        $reflectedPathItemBuilder = new ReflectionClass(PathItem::class);
        $reflectedBuildPost = $reflectedPathItemBuilder->getMethod('buildPost');
        $reflectedBuildPost->setAccessible(true);

        $postObject = $this->createMock(OperationObject::class);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->expects($this->once())
            ->method('newSchemaObject')
            ->with('Operation', $data['post'])
            ->willReturn($postObject);

        $pathItemBuilder = new PathItem($schemaObjectFactory);
        $result = $reflectedBuildPost->invokeArgs($pathItemBuilder, [ $data ]);

        $this->assertSame($postObject, $result);
    }

    public function testBuildDeleteReturnsNullIfEmpty()
    {
        $reflectedPathItemBuilder = new ReflectionClass(PathItem::class);
        $reflectedBuildDelete = $reflectedPathItemBuilder->getMethod('buildDelete');
        $reflectedBuildDelete->setAccessible(true);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);

        $pathItemBuilder = new PathItem($schemaObjectFactory);
        $result = $reflectedBuildDelete->invokeArgs($pathItemBuilder, [[]]);

        $this->assertNull($result);
    }

    public function testBuildDeleteReturnsDeleteIfNotEmpty()
    {
        $data = [
            'delete' => [
                'summary' => 'Some Operation',
            ],
        ];

        $reflectedPathItemBuilder = new ReflectionClass(PathItem::class);
        $reflectedBuildDelete = $reflectedPathItemBuilder->getMethod('buildDelete');
        $reflectedBuildDelete->setAccessible(true);

        $deleteObject = $this->createMock(OperationObject::class);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->expects($this->once())
            ->method('newSchemaObject')
            ->with('Operation', $data['delete'])
            ->willReturn($deleteObject);

        $pathItemBuilder = new PathItem($schemaObjectFactory);
        $result = $reflectedBuildDelete->invokeArgs($pathItemBuilder, [ $data ]);

        $this->assertSame($deleteObject, $result);
    }

    public function testBuildOptionsReturnsNullIfEmpty()
    {
        $reflectedPathItemBuilder = new ReflectionClass(PathItem::class);
        $reflectedBuildOptions = $reflectedPathItemBuilder->getMethod('buildOptions');
        $reflectedBuildOptions->setAccessible(true);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);

        $pathItemBuilder = new PathItem($schemaObjectFactory);
        $result = $reflectedBuildOptions->invokeArgs($pathItemBuilder, [[]]);

        $this->assertNull($result);
    }

    public function testBuildOptionsReturnsOptionsIfNotEmpty()
    {
        $data = [
            'options' => [
                'summary' => 'Some Operation',
            ],
        ];

        $reflectedPathItemBuilder = new ReflectionClass(PathItem::class);
        $reflectedBuildOptions = $reflectedPathItemBuilder->getMethod('buildOptions');
        $reflectedBuildOptions->setAccessible(true);

        $optionsObject = $this->createMock(OperationObject::class);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->expects($this->once())
            ->method('newSchemaObject')
            ->with('Operation', $data['options'])
            ->willReturn($optionsObject);

        $pathItemBuilder = new PathItem($schemaObjectFactory);
        $result = $reflectedBuildOptions->invokeArgs($pathItemBuilder, [ $data ]);

        $this->assertSame($optionsObject, $result);
    }

    public function testBuildHeadReturnsNullIfEmpty()
    {
        $reflectedPathItemBuilder = new ReflectionClass(PathItem::class);
        $reflectedBuildHead = $reflectedPathItemBuilder->getMethod('buildHead');
        $reflectedBuildHead->setAccessible(true);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);

        $pathItemBuilder = new PathItem($schemaObjectFactory);
        $result = $reflectedBuildHead->invokeArgs($pathItemBuilder, [[]]);

        $this->assertNull($result);
    }

    public function testBuildHeadReturnsHeadIfNotEmpty()
    {
        $data = [
            'head' => [
                'summary' => 'Some Operation',
            ],
        ];

        $reflectedPathItemBuilder = new ReflectionClass(PathItem::class);
        $reflectedBuildHead = $reflectedPathItemBuilder->getMethod('buildHead');
        $reflectedBuildHead->setAccessible(true);

        $headObject = $this->createMock(OperationObject::class);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->expects($this->once())
            ->method('newSchemaObject')
            ->with('Operation', $data['head'])
            ->willReturn($headObject);

        $pathItemBuilder = new PathItem($schemaObjectFactory);
        $result = $reflectedBuildHead->invokeArgs($pathItemBuilder, [ $data ]);

        $this->assertSame($headObject, $result);
    }

    public function testBuildPatchReturnsNullIfEmpty()
    {
        $reflectedPathItemBuilder = new ReflectionClass(PathItem::class);
        $reflectedBuildPatch = $reflectedPathItemBuilder->getMethod('buildPatch');
        $reflectedBuildPatch->setAccessible(true);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);

        $pathItemBuilder = new PathItem($schemaObjectFactory);
        $result = $reflectedBuildPatch->invokeArgs($pathItemBuilder, [[]]);

        $this->assertNull($result);
    }

    public function testBuildPatchReturnsPatchIfNotEmpty()
    {
        $data = [
            'patch' => [
                'summary' => 'Some Operation',
            ],
        ];

        $reflectedPathItemBuilder = new ReflectionClass(PathItem::class);
        $reflectedBuildPatch = $reflectedPathItemBuilder->getMethod('buildPatch');
        $reflectedBuildPatch->setAccessible(true);

        $patchObject = $this->createMock(OperationObject::class);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->expects($this->once())
            ->method('newSchemaObject')
            ->with('Operation', $data['patch'])
            ->willReturn($patchObject);

        $pathItemBuilder = new PathItem($schemaObjectFactory);
        $result = $reflectedBuildPatch->invokeArgs($pathItemBuilder, [ $data ]);

        $this->assertSame($patchObject, $result);
    }
}
