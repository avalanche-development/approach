<?php

namespace AvalancheDevelopment\Approach\Schema;

class Response
{

    use Part\Extensions;

    /** @var string */
    protected $description;

    /** @var Schema */
    protected $schema;

    /** @var Headers */
    protected $headers;

    /** @var Example */
    protected $examples;

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return Schema
     */
    public function getSchema()
    {
        return $this->schema;
    }

    /**
     * @param Schema $schema
     */
    public function setSchema(Schema $schema)
    {
        $this->schema = $schema;
    }

    /**
     * @return Headers
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param Headers $headers
     */
    public function setHeaders(Headers $headers)
    {
        $this->headers = $headers;
    }

    /**
     * @return Example
     */
    public function getExample()
    {
        return $this->examples;
    }

    /**
     * @param Exmaple $examples
     */
    public function setExample(Example $examples)
    {
        $this->examples = $examples;
    }
}
