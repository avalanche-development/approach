<?php

namespace AvalancheDevelopment\Approach\Schema;

use AvalancheDevelopment\Approach\TestHelper\SetPropertyTrait;
use PHPUnit_Framework_TestCase;

class LicenseTest extends PHPUnit_Framework_TestCase
{

    use SetPropertyTrait;

    public function testGetNameReturnsName()
    {
        $name = 'Apache 2.0';

        $contact = new License;
        $this->setProperty($contact, 'name', $name);
        $result = $contact->getName();

        $this->assertEquals($name, $result);
    }

    public function testSetNameSetsName()
    {
        $name = 'Apache 2.0';

        $contact = new License;
        $contact->setName($name);

        $this->assertAttributeEquals($name, 'name', $contact);
    }

    public function testGetUrlReturnsUrl()
    {
        $url = 'http://www.apache.org/licenses/LICENSE-2.0.html';

        $contact = new License;
        $this->setProperty($contact, 'url', $url);
        $result = $contact->getUrl();

        $this->assertEquals($url, $result);
    }

    public function testSetUrlSetsUrl()
    {
        $url = 'http://www.apache.org/licenses/LICENSE-2.0.html';

        $contact = new License;
        $contact->setUrl($url);

        $this->assertAttributeEquals($url, 'url', $contact);
    }
}
