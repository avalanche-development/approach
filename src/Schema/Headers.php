<?php

namespace AvalancheDevelopment\Approach\Schema;

class Headers
{

    /** @var array */
    protected $headers;

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param array $headers
     */
    public function setHeaders(array $headers)
    {
        $this->headers = $headers;
    }
}
