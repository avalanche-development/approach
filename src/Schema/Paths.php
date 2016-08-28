<?php

namespace AvalancheDevelopment\Approach\Schema;

use AvalancheDevelopment\Approach\Schema\Part\Extensions;

class Paths
{

    use Extensions;

    /** @var array */
    protected $pathItemList;

    /**
     * @param string $path
     * @return PathItem
     */
    public function getPathItem($path)
    {
        return $this->pathItemList[$path];
    }

    /**
     * @param string $path
     * @param PathItem $pathItem
     */
    public function setPath($path, Path $pathItem)
    {
        $this->pathItemList[$path] = $pathItem;
    }
}
