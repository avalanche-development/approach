<?php

namespace AvalancheDevelopment\Approach\Builder;

use AvalancheDevelopment\Approach\BuilderFactory;
use AvalancheDevelopment\Approach\SchemaObjectFactory;
use Psr\Log\LoggerAwareTrait;
use Psr\Log\NullLogger;

abstract class AbstractBuilder
{

    use LoggerAwareTrait;

    /** @var BuilderFactory */
    protected $builderFactory;

    /** @var SchemaObjectFactory */
    protected $schemaObjectFactory;

    /**
     * @param BuilderFactory $builderFactory
     * @param SchemaObjectFactory $schemaObjectFactory
     */
    public function __construct(
        BuilderFactory $builderFactory,
        SchemaObjectFactory $schemaObjectFactory
    ) {
        $this->builderFactory = $builderFactory;
        $this->schemaObjectFactory = $schemaObjectFactory;
        $this->logger = new NullLogger;
    }
}
