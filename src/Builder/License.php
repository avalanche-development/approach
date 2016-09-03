<?php

namespace AvalancheDevelopment\Approach\Builder;

use AvalancheDevelopment\Approach\Schema\License as LicenseObject;

use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

class License implements LoggerAwareInterface
{

    /** @var LoggerInterface */
    protected $logger;
     
    public function __construct()
    {
        $this->logger = new NullLogger;
    }

    /**
     * @param LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param array $data
     * @return LicenseObject
     */
    public function __invoke(array $data)
    {
        if (empty($data['name'])) {
            $this->logger('Could not build License object - missing name');
            return;
        }

        $license = new LicenseObject;
        $license->setName($data['name']);
        if (!empty($data['url'])) {
            $license->setUrl($data['url']);
        }
        return $license;
    }
}
