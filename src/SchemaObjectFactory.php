<?php

namespace AvalancheDevelopment\Approach;

use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;
use Psr\Log\NullLogger;

class SchemaObjectFactory implements LoggerAwareInterface
{

    use LoggerAwareTrait;

    public function __construct()
    {
        $this->logger = new NullLogger;
    }

    /**
     * @param string $className
     * @param array $data
     * @return mixed
     */
    public function newSchemaObject($className, array $data = [])
    {
        // todo error handling
        if (!empty($data)) {
            $builderPath = $this->resolveBuilderPath($className);
            $builder = new $builderPath($this);
            $builder->setLogger($this->logger);
            $schemaObject = $builder($data);
        } else {
            $schemaObjectPath = $this->resolveSchemaObjectPath($className);
            $schemaObject = new $schemaObjectPath;
        }

        return $schemaObject;
    }

    /**
     * @param string $className
     * @return string
     */
    protected function resolveSchemaObjectPath($className)
    {
        $path = __NAMESPACE__ . "\Schema\{$className}";
        $this->logger->debug("SchemaObjectFactory resolved schema object {$className} -> {$path}");
        return $path;
    }

    /**
     * @param string $className
     * @return string
     */
    protected function resolveBuilderPath($className)
    {
        $path = __NAMESPACE__ . "\Builder\{$className}";
        $this->logger->debug("SchemaObjectFactory resolved builder {$className} -> {$path}");
        return $path;
    }
}
