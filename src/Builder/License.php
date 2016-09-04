<?php

namespace AvalancheDevelopment\Approach\Builder;

use AvalancheDevelopment\Approach\Schema\License as LicenseObject;

use Psr\Log\LoggerAwareInterface;

class License extends AbstractBuilder implements BuilderInterface, LoggerAwareInterface
{

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

        $license = $this->schemaObjectFactory->newSchemaObject('License');
        $license->setName($data['name']);
        if (!empty($data['url'])) {
            $license->setUrl($data['url']);
        }
        return $license;
    }
}
