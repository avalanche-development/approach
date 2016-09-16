<?php

namespace AvalancheDevelopment\Approach\Builder;

use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

class ExternalDocumentation extends AbstractBuilder implements BuilderInterface, LoggerAwareInterface
{

    /**
     * @param array $data
     * @return ExternalDocumentationObject|null
     */
    public function __invoke(array $data)
    {
        if (empty($data['url'])) {
            $this->logger->warning('Could not build ExternalDocumentation object - missing url field');
            return;
        }

        $externaldocumentation = $this->schemaObjectFactory->newSchemaObject('ExternalDocumentation');

        if (!empty($data['description'])) {
            $externaldocumentation->setDescription($data['description']);
        }
        $externaldocumentation->setUrl($data['url']);

        return $externaldocumentation;
    }
}
