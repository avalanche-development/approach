<?php

namespace AvalancheDevelopment\Approach\Schema;

class Operation
{

    use Part\Extensions;

    /** @var array */
    protected $tags;

    /** @var string */
    protected $summary;

    /** @var string */
    protected $description;

    /** @var ExternalDocumentation */
    protected $externalDocs;

    /** @var string */
    protected $operationId;

    /** @var array */
    protected $consumes;

    /** @var array */
    protected $produces;

    /** @var array */
    protected $parameters;

    /** @var Responses */
    protected $responses;

    /** @var array */
    protected $schemes;

    /** @var boolean */
    protected $deprecated;

    /** @var array */
    protected $security;

    /**
     * @return array
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param array $tags
     */
    public function setTags(array $tags)
    {
        $this->tags = $tags;
    }

    /**
     * @return string
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * @param string $summary
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
    }

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
     * @return ExternalDocumentation
     */
    public function getExternalDocumentation()
    {
        return $this->externalDocs;
    }

    /**
     * @param ExternalDocumentation $externalDocs
     */
    public function setExternalDocumentation(ExternalDocumentation $externalDocs)
    {
        $this->externalDocs = $externalDocs;
    }

    /**
     * @return string
     */
    public function getOperationId()
    {
        return $this->operationId;
    }

    /**
     * @param string $operationId
     */
    public function setOperationId($operationId)
    {
        $this->operationId = $operationId;
    }

    /**
     * @return array
     */
    public function getConsumes()
    {
        return $this->consumes;
    }

    /**
     * @param array $consumes
     */
    public function setConsumes(array $consumes)
    {
        $this->consumes = $consumes;
    }

    /**
     * @return array
     */
    public function getProduces()
    {
        return $this->produces;
    }

    /**
     * @param array $produces
     */
    public function setProduces(array $produces)
    {
        $this->produces = $produces;
    }

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

    /**
     * @return Responses
     */
    public function getResponses()
    {
        return $this->responses;
    }

    /**
     * @param Responses $responses
     */
    public function setResponses(Responses $responses)
    {
        $this->responses = $responses;
    }

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

    /**
     * @return boolean
     */
    public function getDeprecated()
    {
        return $this->deprecated;
    }

    /**
     * @param boolean $deprecated
     */
    public function setDeprecated($deprecated)
    {
        $this->deprecated = $deprecated;
    }

    /**
     * @return array
     */
    public function getSecurity()
    {
        return $this->security;
    }

    /**
     * @param array $security
     */
    public function setSecurity(array $security)
    {
        $this->security = $security;
    }
}
