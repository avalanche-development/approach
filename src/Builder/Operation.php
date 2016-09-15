<?php

namespace AvalancheDevelopment\Approach\Builder;

use AvalancheDevelopment\Approach\Schema\ExternalDocumentation as ExternalDocumentationObject;
use AvalancheDevelopment\Approach\Schema\Responses as ResponsesObject;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

class Operation extends AbstractBuilder implements BuilderInterface, LoggerAwareInterface
{

    /**
     * @param array $data
     * @return OperationObject|null
     */
    public function __invoke(array $data)
    {
        $responses = $this->buildResponses($data);
        if ($responses === null) {
            $this->logger->warning('Could not build Operation object - invalid responses attribute');
            return;
        }

        $operation = $this->schemaObjectFactory->newSchemaObject('Operation');

        if (!empty($data['tags'])) {
            $operation->setTags($data['tags']);
        }
        if (!empty($data['summary'])) {
            $operation->setSummary($data['summary']);
        }
        if (!empty($data['description'])) {
            $operation->setDescription($data['description']);
        }

        $externalDocs = $this->buildExternalDocumentation($data);
        if ($externalDocs !== null) {
            $operation->setExternalDocumentation($externalDocs);
        }

        if (!empty($data['operationId'])) {
            $operation->setOperationId($data['operationId']);
        }
        if (!empty($data['consumes'])) {
            $operation->setConsumes($data['consumes']);
        }
        if (!empty($data['produces'])) {
            $operation->setProduces($data['produces']);
        }
        if (!empty($data['parameters'])) {
            $operation->setParameters($data['parameters']);
        }
        $operation->setResponses($responses);
        if (!empty($data['schemes'])) {
            $operation->setSchemes($data['schemes']);
        }
        if (isset($data['deprecated'])) {
            $operation->setDeprecated($data['deprecated']);
        }
        if (!empty($data['security'])) {
            $operation->setSecurity($data['security']);
        }

        return $operation;
    }


    /**
     * @param array $data
     * @return ExternalDocumentation|null
     */
    protected function buildExternalDocumentation(array $data)
    {
        if (empty($data['externalDocs'])) {
            return;
        }

        return $this->schemaObjectFactory->newSchemaObject('ExternalDocumentation', $data['externalDocs']);
    }

    /**
     * @param array $data
     * @return Responses|null
     */
    protected function buildResponses(array $data)
    {
        if (empty($data['responses'])) {
            return;
        }

        return $this->schemaObjectFactory->newSchemaObject('Responses', $data['responses']);
    }
}
