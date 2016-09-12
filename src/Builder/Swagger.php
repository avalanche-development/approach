<?php

namespace AvalancheDevelopment\Approach\Builder;

use AvalancheDevelopment\Approach\Schema\Info as InfoObject;
use AvalancheDevelopment\Approach\Schema\Paths as PathsObject;
use AvalancheDevelopment\Approach\Schema\Definitions as DefinitionsObject;
use AvalancheDevelopment\Approach\Schema\ParametersDefinitions as ParametersDefinitionsObject;
use AvalancheDevelopment\Approach\Schema\ResponsesDefinitions as ResponsesDefinitionsObject;
use AvalancheDevelopment\Approach\Schema\SecurityDefinitions as SecurityDefinitionsObject;
use AvalancheDevelopment\Approach\Schema\ExternalDocumentation as ExternalDocumentationObject;

use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

class Swagger extends AbstractBuilder implements BuilderInterface, LoggerAwareInterface
{

    /**
     * @param array $data
     * @return SwaggerObject|null
     */
    public function __invoke(array $data)
    {
        if (empty($data['swagger'])) {
            $this->logger->warning('Could not build Swagger object - missing swagger field');
            return;
        }

        $info = $this->buildInfo($data);
        if ($info === null) {
            $this->logger->warning('Could not build Swagger object - invalid info attribute');
            return;
        }

        $paths = $this->buildPaths($data);
        if ($paths === null) {
            $this->logger->warning('Could not build Swagger object - invalid paths attribute');
            return;
        }

        $swagger = $this->schemaObjectFactory->newSchemaObject('Swagger');

        $swagger->setSwagger($data['swagger']);
        $swagger->setInfo($info);

        if (!empty($data['host'])) {
            $swagger->setHost($data['host']);
        }
        if (!empty($data['basePath'])) {
            $swagger->setBasePath($data['basePath']);
        }
        if (!empty($data['schemes'])) {
            $swagger->setSchemes($data['schemes']);
        }
        if (!empty($data['consumes'])) {
            $swagger->setConsumes($data['consumes']);
        }
        if (!empty($data['produces'])) {
            $swagger->setProduces($data['produces']);
        }

        $swagger->setPaths($paths);

        $definitions = $this->buildDefinitions($data);
        if ($definitions !== null) {
            $swagger->setDefinitions($definitions);
        }

        $parameters = $this->buildParameters($data);
        if ($parameters !== null) {
            $swagger->setParametersDefinitions($parameters);
        }

        $responses = $this->buildResponses($data);
        if ($responses !== null) {
            $swagger->setResponsesDefinitions($responses);
        }

        $securityDefinitions = $this->buildSecurityDefinitions($data);
        if ($securityDefinitions !== null) {
            $swagger->setSecurityDefinitions($securityDefinitions);
        }

        if (!empty($data['security'])) {
            $swagger->setSecurity($data['security']);
        }
        if (!empty($data['tags'])) {
            $swagger->setTags($data['tags']);
        }

        $externalDocs = $this->buildExternalDocs($data);
        if ($externalDocs !== null) {
            $swagger->setExternalDocumentation($externalDocs);
        }

        return $swagger;
    }

    /**
     * @param array $data
     * @return Info|null
     */
    protected function buildInfo(array $data)
    {
        if (empty($data['info'])) {
            return;
        }

        return $this->schemaObjectFactory->newSchemaObject('Info', $data['info']);
    }

    /**
     * @param array $data
     * @return Paths|null
     */
    protected function buildPaths(array $data)
    {
        if (empty($data['paths'])) {
            return;
        }

        return $this->schemaObjectFactory->newSchemaObject('Paths', $data['paths']);
    }

    /**
     * @param array $data
     * @return Definitions|null
     */
    protected function buildDefinitions(array $data)
    {
        if (empty($data['definitions'])) {
            return;
        }

        return $this->schemaObjectFactory->newSchemaObject('Definitions', $data['definitions']);
    }

    /**
     * @param array $data
     * @return Parameters|null
     */
    protected function buildParameters(array $data)
    {
        if (empty($data['parameters'])) {
            return;
        }

        return $this->schemaObjectFactory->newSchemaObject('Parameters', $data['parameters']);
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

    /**
     * @param array $data
     * @return SecurityDefinitions|null
     */
    protected function buildSecurityDefinitions(array $data)
    {
        if (empty($data['securityDefinitions'])) {
            return;
        }

        return $this->schemaObjectFactory->newSchemaObject('SecurityDefinitions', $data['securityDefinitions']);
    }

    /**
     * @param array $data
     * @return ExternalDocs|null
     */
    protected function buildExternalDocs(array $data)
    {
        if (empty($data['externalDocs'])) {
            return;
        }

        return $this->schemaObjectFactory->newSchemaObject('ExternalDocs', $data['externalDocs']);
    }
}
