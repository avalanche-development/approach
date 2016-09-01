<?php

namespace AvalancheDevelopment\Approach\Schema;

use AvalancheDevelopment\Approach\TestHelper\SetPropertyTrait;
use PHPUnit_Framework_TestCase;

class TagTest extends PHPUnit_Framework_TestCase
{

    use SetPropertyTrait;

    public function testGetNameReturnsName()
    {
        $name = 'name';

        $tag = new Tag;
        $this->setProperty($tag, 'name', $name);
        $result = $tag->getName();

        $this->assertEquals($name, $result);
    }

    public function testSetNameSetsName()
    {
        $name = 'name';

        $tag = new Tag;
        $tag->setName($name);

        $this->assertAttributeEquals($name, 'name', $tag);
    }

    public function testGetDescriptionReturnsDescription()
    {
        $description = 'Some description';

        $tag = new Tag;
        $this->setProperty($tag, 'description', $description);
        $result = $tag->getDescription();

        $this->assertEquals($description, $result);
    }

    public function testSetDescriptionSetsDescription()
    {
        $description = 'Some description';

        $tag = new Tag;
        $tag->setDescription($description);

        $this->assertAttributeEquals($description, 'description', $tag);
    }

    public function testGetExternalDocsReturnsExternalDocs()
    {
        $externalDocs = new ExternalDocumentation;

        $tag = new Tag;
        $this->setProperty($tag, 'externalDocs', $externalDocs);
        $result = $tag->getExternalDocumentation();

        $this->assertEquals($externalDocs, $result);
    }

    public function testSetExternalDocsSetsExternalDocs()
    {
        $externalDocs = new ExternalDocumentation;

        $tag = new Tag;
        $tag->setExternalDocumentation($externalDocs);

        $this->assertAttributeEquals($externalDocs, 'externalDocs', $tag);
    }
}
