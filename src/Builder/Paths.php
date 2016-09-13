<?php

namespace AvalancheDevelopment\Approach\Builder;

use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

class Paths extends AbstractBuilder implements BuilderInterface, LoggerAwareInterface
{

    /**
     * @param array $data
     * @return PathsObject|null
     */
    public function __invoke(array $data)
    {
        $paths = $this->schemaObjectFactory->newSchemaObject('Paths');

        $pathList = $this->buildPathList($data);
        if (!empty($pathList)) {
            $paths->setPaths($pathList);
        }

        return $paths;
    }

    /**
     * @param array $data
     * @return array
     */
    protected function buildPathList(array $data)
    {
        $pathList = [];
        foreach ($data as $key => $pathData) {
            if (substr($key, 0, 2) === 'x-') {
                continue;
            }

            $pathList[$key] = $this->schemaObjectFactory->newSchemaObject('PathItem', $pathData);
        }

        return $pathList;
    }
}
