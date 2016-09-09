<?php

namespace AvalancheDevelopment\Approach\Builder;

use AvalancheDevelopment\Approach\Schema\Items as ItemsObject;

use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

class Header extends AbstractBuilder implements BuilderInterface, LoggerAwareInterface
{

    /**
     * @param array $data
     * @return HeaderObject|null
     */
    public function __invoke(array $data)
    {
        // todo what if items is invalid?
        if (
            empty($data['type']) ||
            $data['type'] === 'array' && empty($data['items'])
        ) {
            return;
        }

        $header = $this->schemaObjectFactory->newSchemaObject('Header');

        if (!empty($data['description'])) {
            $header->setDescription($data['description']);
        }

        $header->setType($data['type']);

        if (!empty($data['format'])) {
            $header->setFormat($data['format']);
        }

        $items = $this->buildItems($data);
        if ($items !== null) {
            $header->setItems($items);
        }

        if (!empty($data['collectionFormat'])) {
            $header->setCollectionFormat($data['collectionFormat']);
        }
        if (!empty($data['default'])) {
            $header->setDefault($data['default']);
        }
        if (!empty($data['maximum'])) {
            $header->setMaximum($data['maximum']);
        }
        if (!empty($data['exclusiveMaximum'])) {
            $header->setExclusiveMaximum($data['exclusiveMaximum']);
        }
        if (!empty($data['minimum'])) {
            $header->setMinimum($data['minimum']);
        }
        if (!empty($data['exclusiveMinimum'])) {
            $header->setExclusiveMinimum($data['exclusiveMinimum']);
        }
        if (!empty($data['maxLength'])) {
            $header->setMaxLength($data['maxLength']);
        }
        if (!empty($data['minLength'])) {
            $header->setMinLength($data['minLength']);
        }
        if (!empty($data['pattern'])) {
            $header->setPattern($data['pattern']);
        }
        if (!empty($data['maxItems'])) {
            $header->setMaxItems($data['maxItems']);
        }
        if (!empty($data['minItems'])) {
            $header->setMinItems($data['minItems']);
        }
        if (!empty($data['uniqueItems'])) {
            $header->setUniqueItems($data['uniqueItems']);
        }
        if (!empty($data['enum'])) {
            $header->setEnum($data['enum']);
        }
        if (!empty($data['multipleOf'])) {
            $header->setMultipleOf($data['multipleOf']);
        }

        return $header;
    }

    /**
     * @param array $data
     * @return Items|null
     */
    protected function buildItems(array $data) {
        if (empty($data['items'])) {
            return;
        }

        return $this->schemaObjectFactory->newSchemaObject('Items', $data['items']);
    }
}
