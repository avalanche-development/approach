<?php

namespace AvalancheDevelopment\Approach\Schema;

class ParametersDefinitions
{

    /** @var array */
    protected $parameters;

    /**
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @param array $parameters
     */
    public function setParameters(array $parameters)
    {
        $this->parameters = $parameters;
    }
}
