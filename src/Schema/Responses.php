<?php

namespace AvalancheDevelopment\Approach\Schema;

class Responses
{

    use Part\Extensions;

    /** @var Response */
    protected $default;

    /** @var array */
    protected $responses;

    /**
     * @return Response
     */
    public function getDefault()
    {
        return $this->default;
    }

    /**
     * @param Response $default
     */
    public function setDefault(Response $default)
    {
        $this->default = $response;
    }

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
