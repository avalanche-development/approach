<?php

namespace AvalancheDevelopment\Approach\Schema;

class Example
{

    /** @var array */
    protected $responses;

    /**
     * @return array
     */
    public function getResponses()
    {
        return $this->responses;
    }

    /**
     * @param array $responses
     */
    public function setResponses(array $responses)
    {
        $this->responses = $responses;
    }
}
