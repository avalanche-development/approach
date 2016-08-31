<?php

namespace AvalancheDevelopment\Approach\Schema\Part;

trait Extensions
{

    /** @var array */
    protected $extensions = [];

    /**
     * @param string $name
     * @return mixed
     */
    public function getExtension($name)
    {
        if (array_key_exists($name, $this->extensions)) {
            return $this->extensions[$name];
        }
        return;
    }

    /**
     * @param string $name
     * @param mixed $value
     */
    public function setExtension($name, $value)
    {
        $this->extensions[$name] = $value;
    }
}
