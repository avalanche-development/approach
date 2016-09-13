<?php

namespace AvalancheDevelopment\Approach\Builder;

use AvalancheDevelopment\Approach\Schema\Paths as PathsObject;
use AvalancheDevelopment\Approach\Schema\PathItem as PathItemObject;
use AvalancheDevelopment\Approach\SchemaObjectFactory;
use PHPUnit_Framework_TestCase;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use ReflectionClass;

class PathsTest extends PHPUnit_Framework_TestCase
{

    public function testPathsImplementsBuilderInterface()
    {
        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);

        $pathsBuilder = new Paths($schemaObjectFactory);

        $this->assertInstanceOf(BuilderInterface::class, $pathsBuilder);
    }

    public function testPathsImplementsLoggerInterface()
    {
        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);

        $pathsBuilder = new Paths($schemaObjectFactory);

        $this->assertInstanceOf(LoggerAwareInterface::class, $pathsBuilder);
    }

    public function testInvokeDoesNotSetPathsIfEmpty()
    {
        $pathsObject = $this->createMock(PathsObject::class);
        $pathsObject->expects($this->never())
            ->method('setPaths');

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Paths')
            ->willReturn($pathsObject);

        $pathsBuilder = $this->getMockBuilder(Paths::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildPathList' ])
            ->getMock();
        $pathsBuilder->method('buildPathList')
            ->willReturn([]);
        $pathsBuilder([]);
    }

    public function testInvokeSetsPathsIfNotEmpty()
    {
        $pathList = [
            'Some Path',
        ];

        $pathsObject = $this->createMock(PathsObject::class);
        $pathsObject->expects($this->once())
            ->method('setPaths')
            ->with($pathList);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->method('newSchemaObject')
            ->with('Paths')
            ->willReturn($pathsObject);

        $pathsBuilder = $this->getMockBuilder(Paths::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->setMethods([ 'buildPathList' ])
            ->getMock();
        $pathsBuilder->method('buildPathList')
            ->willReturn($pathList);
        $pathsBuilder([]);
    }

    public function testBuildPathListReturnsEmptyListIfEmpty()
    {
        $reflectedPathsBuilder = new ReflectionClass(Paths::class);
        $reflectedBuildPathList = $reflectedPathsBuilder->getMethod('buildPathList');
        $reflectedBuildPathList->setAccessible(true);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);

        $pathsBuilder = new Paths($schemaObjectFactory);
        $result = $reflectedBuildPathList->invokeArgs($pathsBuilder, [[]]);

        $this->assertEquals([], $result);
    }

    public function testBuildPathListIgnoresExtensions()
    {
        $reflectedPathsBuilder = new ReflectionClass(Paths::class);
        $reflectedBuildPathList = $reflectedPathsBuilder->getMethod('buildPathList');
        $reflectedBuildPathList->setAccessible(true);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);

        $pathsBuilder = new Paths($schemaObjectFactory);
        $result = $reflectedBuildPathList->invokeArgs($pathsBuilder, [[ 'x-vendor' => 'value' ]]);

        $this->assertEquals([], $result);
    }
 
    public function testBuildPathListReturnsPathListIfNotEmpty()
    {
        $inputData = [
            '/path' => [
              'some value',
            ],
        ];

        $outputData = [
            '/path' => $this->createMock(PathItemObject::class),
        ];

        $reflectedPathsBuilder = new ReflectionClass(Paths::class);
        $reflectedBuildPathList = $reflectedPathsBuilder->getMethod('buildPathList');
        $reflectedBuildPathList->setAccessible(true);

        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);
        $schemaObjectFactory->expects($this->once())
            ->method('newSchemaObject')
            ->with('PathItem', $inputData['/path'])
            ->willReturn($outputData['/path']);

        $pathsBuilder = new Paths($schemaObjectFactory);
        $result = $reflectedBuildPathList->invokeArgs($pathsBuilder, [ $inputData ]);

        $this->assertSame($outputData, $result);
    }
}
