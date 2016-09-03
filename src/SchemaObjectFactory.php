<?php

namespace AvalancheDevelopment\Approach;

use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

class SchemaObjectFactory implements LoggerAwareInterface
{

    /** @var LoggerInterface */
    protected $logger;

    public function __construct()
    {
        $this->logger = new NullLogger;
    }

    /**
     * @param string $className
     * @return mixed
     */
    public function newSchemaObject($className)
    {
        $fullPath = $this->resolvePath($className);
        return new $fullPath; // todo error handling
    }

    /**
     * @param string $className
     * @return string
     */
    protected function resolvePath($className)
    {
        $path = __NAMESPACE__ . "\Schema\{$className}";
        $this->logger->debug("SchemaObjectFactory resolved {$className} -> {$path}");
        return $path;
    }

    /**
     * @param LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
}
