<?php

namespace AvalancheDevelopment\Approach\Builder;

use AvalancheDevelopment\Approach\Schema\Operation as OperationObject;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

class PathItem extends AbstractBuilder implements BuilderInterface, LoggerAwareInterface
{

    /**
     * @param array $data
     * @return PathItemObject|null
     */
    public function __invoke(array $data)
    {
        $pathitem = $this->schemaObjectFactory->newSchemaObject('PathItem');

        $get = $this->buildGet($data);
        if ($get !== null) {
            $pathitem->setGet($get);
        }

        $put = $this->buildPut($data);
        if ($put !== null) {
            $pathitem->setPut($put);
        }

        $post = $this->buildPost($data);
        if ($post !== null) {
            $pathitem->setPost($post);
        }

        $delete = $this->buildDelete($data);
        if ($delete !== null) {
            $pathitem->setDelete($delete);
        }

        $options = $this->buildOptions($data);
        if ($options !== null) {
            $pathitem->setOptions($options);
        }

        $head = $this->buildHead($data);
        if ($head !== null) {
            $pathitem->setHead($head);
        }

        $patch = $this->buildPatch($data);
        if ($patch !== null) {
            $pathitem->setPatch($patch);
        }

        if (!empty($data['parameters'])) {
            $pathitem->setParameters($data['parameters']);
        }

        return $pathitem;
    }

    /**
     * @param array $data
     * @return Operation|null
     */
    protected function buildGet(array $data)
    {
        if (empty($data['get'])) {
            return;
        }

        return $this->schemaObjectFactory->newSchemaObject('Operation', $data['get']);
    }

    /**
     * @param array $data
     * @return Operation|null
     */
    protected function buildPut(array $data)
    {
        if (empty($data['put'])) {
            return;
        }

        return $this->schemaObjectFactory->newSchemaObject('Operation', $data['put']);
    }

    /**
     * @param array $data
     * @return Operation|null
     */
    protected function buildPost(array $data)
    {
        if (empty($data['post'])) {
            return;
        }

        return $this->schemaObjectFactory->newSchemaObject('Operation', $data['post']);
    }

    /**
     * @param array $data
     * @return Operation|null
     */
    protected function buildDelete(array $data)
    {
        if (empty($data['delete'])) {
            return;
        }

        return $this->schemaObjectFactory->newSchemaObject('Operation', $data['delete']);
    }

    /**
     * @param array $data
     * @return Operation|null
     */
    protected function buildOptions(array $data)
    {
        if (empty($data['options'])) {
            return;
        }

        return $this->schemaObjectFactory->newSchemaObject('Operation', $data['options']);
    }

    /**
     * @param array $data
     * @return Operation|null
     */
    protected function buildHead(array $data)
    {
        if (empty($data['head'])) {
            return;
        }

        return $this->schemaObjectFactory->newSchemaObject('Operation', $data['head']);
    }

    /**
     * @param array $data
     * @return Operation|null
     */
    protected function buildPatch(array $data)
    {
        if (empty($data['patch'])) {
            return;
        }

        return $this->schemaObjectFactory->newSchemaObject('Operation', $data['patch']);
    }
}
