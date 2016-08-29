<?php

namespace AvalancheDevelopment\Approach\Schema;

use AvalancheDevelopment\Approach\Schema\Part\Extensions;

class Swagger
{

    use Extensions;

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

    /** @var Parameters */
    protected $parameters;

    /** @var Responses */
    protected $responses;

    /** @var SecurityDefinitions */
    protected $securityDefinitions;

    /** @var array */
    protected $security;

    /** @var array */
    protected $tags;

    /** @var ExternalDocs */
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
     * @return ExternalDocs
     */
    public function getExternalDocs()
    {
        return $this->externalDocs;
    }

    /**
     * @param ExternalDocs $externalDocs
     */
    public function setExternalDocs(ExternalDocs $externalDocs)
    {
        $this->externalDocs = $externalDocs;
    }
}
