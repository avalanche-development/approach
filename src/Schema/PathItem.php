<?php

namespace AvalancheDevelopment\Approach\Schema;

use AvalancheDevelopment\Approach\Schema\Part\Extensions;

class PathItem
{

    use Extensions;

    /** @var Operation */
    protected $get;

    /** @var Operation */
    protected $put;

    /** @var Operation */
    protected $post;

    /** @var Operation */
    protected $delete;

    /** @var Operation */
    protected $options;

    /** @var Operation */
    protected $head;

    /** @var Operation */
    protected $patch;

    /** @var array */
    protected $parameters;

    /**
     * @return Operation
     */
    public function getGet()
    {
        return $this->get;
    }

    /**
     * @param Operation $get
     */
    public function setGet(Operation $get)
    {
        $this->get = $get;
    }

    /**
     * @return Operation
     */
    public function getPut()
    {
        return $this->put;
    }

    /**
     * @param Operation $put
     */
    public function setPut(Operation $put)
    {
        $this->put = $put;
    }

    /**
     * @return Operation
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * @param Operation $post
     */
    public function setPost(Operation $post)
    {
        $this->post = $post;
    }

    /**
     * @return Operation
     */
    public function getDelete()
    {
        return $this->delete;
    }

    /**
     * @param Operation $delete
     */
    public function setDelete(Operation $delete)
    {
        $this->delete = $delete;
    }

    /**
     * @return Operation
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param Operation $options
     */
    public function setOptions(Operation $options)
    {
        $this->options = $options;
    }

    /**
     * @return Operation
     */
    public function getHead()
    {
        return $this->head;
    }

    /**
     * @param Operation $head
     */
    public function setHead(Operation $head)
    {
        $this->head = $head;
    }

    /**
     * @return Operation
     */
    public function getPatch()
    {
        return $this->patch;
    }

    /**
     * @param Operation $patch
     */
    public function setPatch(Operation $patch)
    {
        $this->patch = $patch;
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
}
