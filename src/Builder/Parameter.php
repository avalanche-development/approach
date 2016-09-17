<?php

namespace AvalancheDevelopment\Approach\Builder;

use AvalancheDevelopment\Approach\Schema\Schema as SchemaObject;
use AvalancheDevelopment\Approach\Schema\Items as ItemsObject;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

class Parameter extends AbstractBuilder implements BuilderInterface, LoggerAwareInterface
{

    /**
     * @param array $data
     * @return ParameterObject|null
     */
    public function __invoke(array $data)
    {
        if (empty($data['name']) || empty($data['in'])) {
            $this->logger->warning('Could not build Parameter object - missing name or in');
            return;
        }

        $parameter = $this->schemaObjectFactory->newSchemaObject('Parameter');

        $parameter->setName($data['name']);
        $parameter->setIn($data['in']);

        if (!empty($data['description'])) {
            $parameter->setDescription($data['description']);
        }

        if ($data['in'] === 'path') {
            if (empty($data['required'])) {
                $this->logger->warning('Could not build Parameter object - path parameters must be required');
                return;
            }
            $parameter->setRequired(true);
        } else if (!empty($data['required'])) {
            $parameter->setRequired(true);
        } else {
            $parameter->setRequired(false);
        }

        if ($data['in'] === 'body') {
            $schema = $this->buildSchema($data);
            if ($schema === null) {
                $this->logger->warning('Could not build Parameter object - Schema is required for body');
                return;
            }
            $parameter->setSchema($schema);
        } else {
            if (empty($data['type'])) {
                $this->logger->warning('Could not build Parameter object - type is required for !body');
                return;
            }
            $parameter->setType($data['type']);

            if (!empty($data['format'])) {
                $parameter->setFormat($data['format']);
            }

            if (!empty($data['allowEmptyValue'])) {
                $parameter->setAllowEmptyValue(true);
            } else {
                $parameter->setAllowEmptyValue(false);
            }

            $items = $this->buildItems($data);
            if ($items === null && $data['type'] === 'array') {
                $this->logger->warning('Could not build Parameter object - items is required for array');
                return;
            }
            if ($items !== null) {
                $parameter->setItems($items);
            }

            if (!empty($data['collectionFormat'])) {
                $parameter->setCollectionFormat($data['collectionFormat']);
            }

            if (!empty($data['default'])) {
                $parameter->setDefault($data['default']);
            }
            if (!empty($data['maximum'])) {
                $parameter->setMaximum($data['maximum']);
            }
            if (!empty($data['exclusiveMaximum'])) {
                $parameter->setExclusiveMaximum($data['exclusiveMaximum']);
            }
            if (!empty($data['minimum'])) {
                $parameter->setMinimum($data['minimum']);
            }
            if (!empty($data['exclusiveMinimum'])) {
                $parameter->setExclusiveMinimum($data['exclusiveMinimum']);
            }
            if (!empty($data['maxLength'])) {
                $parameter->setMaxLength($data['maxLength']);
            }
            if (!empty($data['minLength'])) {
                $parameter->setMinLength($data['minLength']);
            }
            if (!empty($data['pattern'])) {
                $parameter->setPattern($data['pattern']);
            }
            if (!empty($data['maxItems'])) {
                $parameter->setMaxItems($data['maxItems']);
            }
            if (!empty($data['minItems'])) {
                $parameter->setMinItems($data['minItems']);
            }
            if (!empty($data['uniqueItems'])) {
                $parameter->setUniqueItems($data['uniqueItems']);
            }
            if (!empty($data['enum'])) {
                $parameter->setEnum($data['enum']);
            }
            if (!empty($data['multipleOf'])) {
                $parameter->setMultipleOf($data['multipleOf']);
            }
        }

        return $parameter;
    }


    /**
     * @param array $data
     * @return Schema|null
     */
    protected function buildSchema(array $data)
    {
        if (empty($data['schema'])) {
            return;
        }

        return $this->schemaObjectFactory->newSchemaObject('Schema', $data['schema']);
    }

    /**
     * @param array $data
     * @return Items|null
     */
    protected function buildItems(array $data)
    {
        if (empty($data['items'])) {
            return;
        }

        return $this->schemaObjectFactory->newSchemaObject('Items', $data['items']);
    }
}
