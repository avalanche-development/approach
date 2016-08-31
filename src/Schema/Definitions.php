<?php

namespace AvalancheDevelopment\Approach\Schema;

class Definitions
{

    /** @var array */
    protected $dataTypes;

    /**
     * @return array
     */
    public function getDataTypes()
    {
        return $this->dataTypes;
    }

    /**
     * @param array $dataTypes
     */
    public function setDataTypes(array $dataTypes)
    {
        $this->dataTypes = $dataTypes;
    }
}
