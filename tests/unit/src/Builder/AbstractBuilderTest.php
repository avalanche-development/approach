<?php

namespace AvalancheDevelopment\Approach\Builder;

use AvalancheDevelopment\Approach\BuilderFactory;
use AvalancheDevelopment\Approach\SchemaObjectFactory;
use PHPUnit_Framework_TestCase;
use Psr\Log\NullLogger;

class AbstractBuilderTest extends PHPUnit_Framework_TestCase
{

    public function testConstructSetsFactories()
    {
        $builderFactory = $this->createMock(BuilderFactory::class);
        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);

        $abstractBuilder = $this->getMockBuilder(AbstractBuilder::class)
            ->setConstructorArgs([
                $builderFactory,
                $schemaObjectFactory,
            ])
            ->getMock();

        $this->assertAttributeSame($builderFactory, 'builderFactory', $abstractBuilder);
        $this->assertAttributeSame($schemaObjectFactory, 'schemaObjectFactory', $abstractBuilder);
    }

    public function testConstructSetsNullLogger()
    {
        $builderFactory = $this->createMock(BuilderFactory::class);
        $schemaObjectFactory = $this->createMock(SchemaObjectFactory::class);

        $abstractBuilder = $this->getMockBuilder(AbstractBuilder::class)
            ->setConstructorArgs([
                $builderFactory,
                $schemaObjectFactory,
            ])
            ->getMock();

        $this->assertAttributeInstanceOf(NullLogger::class, 'logger', $abstractBuilder);
    }
}
