<?php

namespace AvalancheDevelopment\Approach\Builder;

use AvalancheDevelopment\Approach\SchemaObjectFactory;
use PHPUnit_Framework_TestCase;
use Psr\Log\NullLogger;

class AbstractBuilderTest extends PHPUnit_Framework_TestCase
{

    public function testConstructSetsSchemaObjectFactory()
    {
        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);

        $abstractBuilder = $this->getMockBuilder(AbstractBuilder::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->getMock();

        $this->assertAttributeSame($schemaObjectFactory, 'schemaObjectFactory', $abstractBuilder);
    }

    public function testConstructSetsNullLogger()
    {
        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);

        $abstractBuilder = $this->getMockBuilder(AbstractBuilder::class)
            ->setConstructorArgs([ $schemaObjectFactory ])
            ->getMock();

        $this->assertAttributeInstanceOf(NullLogger::class, 'logger', $abstractBuilder);
    }
}
