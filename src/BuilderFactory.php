<?php

namespace AvalancheDevelopment\Approach;

use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;
use Psr\Log\NullLogger;

class BuilderFactory implements LoggerAwareInterface
{

    use LoggerAwareTrait;

    /** @var SchemaObjectFactory */
    protected $schemaObjectFactory;

    /**
     * @param SchemaObjectFactory $schemaObjectFactory
     */
    public function __construct(SchemaObjectFactory $schemaObjectFactory)
    {
        $this->schemaObjectFactory = $schemaObjectFactory;
        $this->logger = new NullLogger;
    }

    /**
     * @param string $className
     * @return mixed
     */
    public function newBuilder($className)
    {
        $fullPath = $this->resolvePath($className);
        $builder = new $fullPath($this, $schemaObjectFactory); // todo error handling
        $builder->setLogger($this->logger);
        return $builder;
    }

    /**
     * @param string $className
     * @return string
     */
    protected function resolvePath($className)
    {
        $path = __NAMESPACE__ . "\Builder\{$className}";
        $this->logger->debug("BuilderFactory resolved {$className} -> {$path}");
        return $path;
    }
}
