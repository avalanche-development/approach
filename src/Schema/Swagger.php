<?php

namespace AvalancheDevelopment\Approach\Schema;

class Swagger
{

    use Part\Extensions;

    /** @var string */
    protected $swagger;

    /** @var Info */
    protected $info;

    /** @var string */
    protected $host;

    /** @var string */
    protected $basePath;

    /** @var array */
    protected $schemes;

    /** @var array */
    protected $consumes;

    /** @var array */
    protected $produces;

    /** @var Paths */
    protected $paths;

    /** @var Definitions */
    protected $definitions;

    /** @var ParametersDefinitions */
    protected $parameters;

    /** @var ResponseDefinitions */
    protected $responses;

    /** @var SecurityDefinitions */
    protected $securityDefinitions;

    /** @var array */
    protected $security;

    /** @var array */
    protected $tags;

    /** @var ExternalDocumentation */
    protected $externalDocs;

    /**
     * @return string
     */
    public function getSwagger()
    {
        return $this->swagger;
    }

    /**
     * @param string $swagger
     */
    public function setSwagger($swagger)
    {
        $this->swagger = $swagger;
    }

    /**
     * @return Info
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * @param Info $info
     */
    public function setInfo(Info $info)
    {
        $this->info = $info;
    }

    /**
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @param string $host
     */
    public function setHost($host)
    {
        $this->host = $host;
    }

    /**
     * @return string
     */
    public function getBasePath()
    {
        return $this->basePath;
    }

    /**
     * @param string $basePath
     */
    public function setBasePath($basePath)
    {
        $this->basePath = $basePath;
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
     * @return Paths
     */
    public function getPaths()
    {
        return $this->paths;
    }

    /**
     * @param Paths $paths
     */
    public function setPaths(Paths $paths)
    {
        $this->paths = $paths;
    }

    /**
     * @return Definitions
     */
    public function getDefinitions()
    {
        return $this->definitions;
    }

    /**
     * @param Definitions $definitions
     */
    public function setDefinitions(Definitions $definitions)
    {
        $this->definitions = $definitions;
    }

    /**
     * @return ParametersDefinitions
     */
    public function getParametersDefinitions()
    {
        return $this->parameters;
    }

    /**
     * @param ParametersDefinitions $parameters
     */
    public function setParametersDefinitions(ParametersDefinitions $parameters)
    {
        $this->parameters = $parameters;
    }

    /**
     * @return ResponsesDefinitions
     */
    public function getResponsesDefinitions()
    {
        return $this->responses;
    }

    /**
     * @param ResponsesDefinitions $responses
     */
    public function setResponsesDefinitions(ResponsesDefinitions $responses)
    {
        $this->responses = $responses;
    }

    /**
     * @return SecurityDefinitions
     */
    public function getSecurityDefinitions()
    {
        return $this->securityDefinitions;
    }

    /**
     * @param SecurityDefinitions $securityDefinitions
     */
    public function setSecurityDefinitions(SecurityDefinitions $securityDefinitions)
    {
        $this->securityDefinitions = $securityDefinitions;
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
}
