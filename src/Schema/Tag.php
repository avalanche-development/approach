<?php

namespace AvalancheDevelopment\Approach\Schema;

class Tag
{

    use Part\Extensions;

    /** @var string */
    protected $name;

    /** @var string */
    protected $description;

    /** @var ExternalDocumentation */
    protected $externalDocs;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
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
}
