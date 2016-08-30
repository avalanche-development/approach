<?php

namespace AvalancheDevelopment\Approach\Schema;

use AvalancheDevelopment\Approach\TestHelper\SetPropertyTrait;
use PHPUnit_Framework_TestCase;

class ExternalDocsContactTest extends PHPUnit_Framework_TestCase
{

    use SetPropertyTrait;

    public function testGetDescriptionReturnsDescription()
    {
        $description = 'More info here';

        $externalDocs = new ExternalDocs;
        $this->setProperty($externalDocs, 'description', $description);
        $result = $externalDocs->getDescription();

        $this->assertEquals($description, $result);
    }

    public function testSetDescriptionSetsDescription()
    {
        $description = 'More info here';

        $externalDocs = new ExternalDocs;
        $externalDocs->setDescription($description);

        $this->assertAttributeEquals($description, 'description', $externalDocs);
    }

    public function testGetUrlReturnsUrl()
    {
        $url = 'http://domain.tld/info';

        $externalDocs = new ExternalDocs;
        $this->setProperty($externalDocs, 'url', $url);
        $result = $externalDocs->getUrl();

        $this->assertEquals($url, $result);
    }

    public function testSetUrlSetsUrl()
    {
        $url = 'http://domain.tld/info';

        $externalDocs = new ExternalDocs;
        $externalDocs->setUrl($url);

        $this->assertAttributeEquals($url, 'url', $externalDocs);
    }
}
