<?php

namespace AvalancheDevelopment\Approach;

use PHPUnit_Framework_TestCase;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use ReflectionClass;

class SchemaObjectFactoryTest extends PHPUnit_Framework_TestCase
{

    public function testImplementsLoggerAwareInterface()
    {
        $schemaObjectFactory = new SchemaObjectFactory;

        $this->assertInstanceOf(LoggerAwareInterface::class, $schemaObjectFactory);
    }

    public function testConstructSetsNewNullLogger()
    {
        $schemaObjectFactory = new SchemaObjectFactory;

        $this->assertAttributeInstanceOf(NullLogger::class, 'logger', $schemaObjectFactory);
    }

    public function testNewSchemaObjectReturnsNewObject()
    {
        $this->markTestIncomplete('Need to find a way to mock autoloader');
    }

    public function testResolvePathReturnsPath()
    {
        $this->markTestIncomplete('Refactored out');
        return;

        $className = 'TestClass';
        $path = __NAMESPACE__ . "\Schema\{$className}";

        $mockLogger = $this->createMock(LoggerInterface::class);
        $mockLogger->expects($this->once())
            ->method('debug')
            ->with("SchemaObjectFactory resolved {$className} -> {$path}");

        $schemaObjectFactory = new SchemaObjectFactory;
        $schemaObjectFactory->setLogger($mockLogger);

        $reflectedFactory = new ReflectionClass($schemaObjectFactory);
        $reflectedResolvePath = $reflectedFactory->getMethod('resolvePath');
        $reflectedResolvePath->setAccessible(true);

        $result = $reflectedResolvePath->invokeArgs($schemaObjectFactory, [ $className ]);

        $this->assertEquals($path, $result);
    }
}
