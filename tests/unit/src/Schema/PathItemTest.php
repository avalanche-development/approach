<?php

namespace AvalancheDevelopment\Approach\Schema;

use AvalancheDevelopment\Approach\TestHelper\SetPropertyTrait;
use PHPUnit_Framework_TestCase;

class PathItemTest extends PHPUnit_Framework_TestCase
{

    use SetPropertyTrait;

    public function testGetGetReturnsGet()
    {
        $get = new Operation;

        $pathItem = new PathItem;
        $this->setProperty($pathItem, 'get', $get);
        $result = $pathItem->getGet();

        $this->assertSame($get, $result);
    }

    public function testSetGetSetsGet()
    {
        $get = new Operation;

        $pathItem = new PathItem;
        $pathItem->setGet($get);

        $this->assertAttributeSame($get, 'get', $pathItem);
    }

    public function testGetPutReturnsPut()
    {
        $put = new Operation;

        $pathItem = new PathItem;
        $this->setProperty($pathItem, 'put', $put);
        $result = $pathItem->getPut();

        $this->assertSame($put, $result);
    }

    public function testSetPutSetsPut()
    {
        $put = new Operation;

        $pathItem = new PathItem;
        $pathItem->setPut($put);

        $this->assertAttributeSame($put, 'put', $pathItem);
    }

    public function testGetPostReturnsPost()
    {
        $post = new Operation;

        $pathItem = new PathItem;
        $this->setProperty($pathItem, 'post', $post);
        $result = $pathItem->getPost();

        $this->assertSame($post, $result);
    }

    public function testSetPostSetsPost()
    {
        $post = new Operation;

        $pathItem = new PathItem;
        $pathItem->setPost($post);

        $this->assertAttributeSame($post, 'post', $pathItem);
    }

    public function testGetDeleteReturnsDelete()
    {
        $delete = new Operation;

        $pathItem = new PathItem;
        $this->setProperty($pathItem, 'delete', $delete);
        $result = $pathItem->getDelete();

        $this->assertSame($delete, $result);
    }

    public function testSetDeleteSetsDelete()
    {
        $delete = new Operation;

        $pathItem = new PathItem;
        $pathItem->setDelete($delete);

        $this->assertAttributeSame($delete, 'delete', $pathItem);
    }

    public function testGetOptionsReturnsOptions()
    {
        $options = new Operation;

        $pathItem = new PathItem;
        $this->setProperty($pathItem, 'options', $options);
        $result = $pathItem->getOptions();

        $this->assertSame($options, $result);
    }

    public function testSetOptionsSetsOptions()
    {
        $options = new Operation;

        $pathItem = new PathItem;
        $pathItem->setOptions($options);

        $this->assertAttributeSame($options, 'options', $pathItem);
    }

    public function testGetHeadReturnsHead()
    {
        $head = new Operation;

        $pathItem = new PathItem;
        $this->setProperty($pathItem, 'head', $head);
        $result = $pathItem->getHead();

        $this->assertSame($head, $result);
    }

    public function testSetHeadSetsHead()
    {
        $head = new Operation;

        $pathItem = new PathItem;
        $pathItem->setHead($head);

        $this->assertAttributeSame($head, 'head', $pathItem);
    }

    public function testGetPatchReturnsPatch()
    {
        $patch = new Operation;

        $pathItem = new PathItem;
        $this->setProperty($pathItem, 'patch', $patch);
        $result = $pathItem->getPatch();

        $this->assertSame($patch, $result);
    }

    public function testSetPatchSetsPatch()
    {
        $patch = new Operation;

        $pathItem = new PathItem;
        $pathItem->setPatch($patch);

        $this->assertAttributeSame($patch, 'patch', $pathItem);
    }

    public function testGetParametersReturnsParameters()
    {
        $parameters = [ new Parameter ];

        $pathItem = new PathItem;
        $this->setProperty($pathItem, 'parameters', $parameters);
        $result = $pathItem->getParameters();

        $this->assertEquals($parameters, $result);
    }

    public function testSetParametersSetsParameters()
    {
        $parameters = [ new Parameter ];

        $pathItem = new PathItem;
        $pathItem->setParameters($parameters);

        $this->assertAttributeEquals($parameters, 'parameters', $pathItem);
    }
}
