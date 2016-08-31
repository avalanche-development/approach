<?php

namespace AvalancheDevelopment\Approach\Schema;

class Scopes
{

    use Part\Extensions;

    /** @var array */
    protected $scopes;

    /**
     * @return array
     */
    public function getScopes()
    {
        return $this->scopes;
    }

    /**
     * @param array $scopes
     */
    public function setScopes(array $scopes)
    {
        $this->scopes = $scopes;
    }
}
