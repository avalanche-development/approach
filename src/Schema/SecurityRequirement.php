<?php

namespace AvalancheDevelopment\Approach\Schema;

class SecurityRequirement
{

    /** @var array */
    protected $schemes;

    /**
     * @return array
     */
    public function getSchemes()
    {
        return $this->schemes;
    }

    /**
     * @param array $schemes
     */
    public function setSchemes(array $schemes)
    {
        $this->schemes = $schemes;
    }
}
