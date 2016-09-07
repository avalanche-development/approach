<?php

namespace AvalancheDevelopment\Approach\Builder;

use AvalancheDevelopment\Approach\SchemaObjectFactory;
use Psr\Log\LoggerAwareTrait;
use Psr\Log\NullLogger;

abstract class AbstractBuilder
{

    use LoggerAwareTrait;

    /** @var SchemaObjectFactory */
    protected $schemaObjectFactory;

    /**
     * @param SchemaObjectFactory $schemaObjectFactory
     */
    public function __construct(SchemaObjectFactory $schemaObjectFactory) {
        $this->schemaObjectFactory = $schemaObjectFactory;
        $this->logger = new NullLogger;
    }
}
