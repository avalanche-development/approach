<?php

namespace AvalancheDevelopment\Approach\Schema;

class Paths
{

    use Part\Extensions;

    /** @var array */
    protected $paths;

    /**
     * @return array
     */
    public function getPaths()
    {
        return $this->paths;
    }

    /**
     * @param array $paths
     */
    public function setPaths($paths)
    {
        $this->paths = $paths;
    }
}
