<?php

namespace AvalancheDevelopment\Approach\Builder;

use AvalancheDevelopment\Approach\Schema\Info as InfoObject;
use AvalancheDevelopment\Approach\Schema\Contact as ContactObject;
use AvalancheDevelopment\Approach\Schema\License as LicenseObject;

use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

class Info extends AbstractBuilder implements BuilderInterface, LoggerAwareInterface
{

    /**
     * @param array $data
     * @return InfoObject|null
     */
    public function __invoke(array $data)
    {
        if (empty($data['title']) || empty($data['version'])) {
            $this->logger('Could not build Info object - missing title or version');
            return;
        }

        $info = $this->schemaObjectFactory->newSchemaObject('Info');
        $info->setTitle($data['title']);
        if (!empty($data['description'])) {
            $info->setDescription($data['description']);
        }
        if (!empty($data['termsOfService'])) {
            $info->setTermsOfService($data['termsOfService']);
        }

        $contact = $this->buildContact($data);
        if (!empty($contact)) {
            $info->setContact($contact);
        }

        $license = $this->buildLicense($data);
        if (!empty($license)) {
            $info->setLicense($license);
        }

        $info->setVersion($data['version']);

        return $info;
    }

    /**
     * @param array $data
     * @return ContactObject|null
     */
    protected function buildContact(array $data)
    {
        if (empty($data['contact'])) {
            return;
        }

        return $this->builderFactory->newBuilder('Contact')($data['contact']);
    }

    /**
     * @param array $data
     * @return LicenseObject|null
     */
    protected function buildLicense(array $data)
    {
        if (empty($data['license'])) {
            return;
        }

        return $this->builderFactory->newBuilder('License')($data['license']);
    }
}
