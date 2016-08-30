<?php

namespace AvalancheDevelopment\Approach\Schema;

use AvalancheDevelopment\Approach\TestHelper\SetPropertyTrait;
use PHPUnit_Framework_TestCase;

class ContactTest extends PHPUnit_Framework_TestCase
{

    use SetPropertyTrait;

    public function testGetNameReturnsName()
    {
        $name = 'Jack Black';

        $contact = new Contact;
        $this->setProperty($contact, 'name', $name);
        $result = $contact->getName();

        $this->assertEquals($name, $result);
    }

    public function testSetNameSetsName()
    {
        $name = 'Jane Black';

        $contact = new Contact;
        $contact->setName($name);

        $this->assertAttributeEquals($name, 'name', $contact);
    }

    public function testGetUrlReturnsUrl()
    {
        $url = 'http://black.tld/jack';

        $contact = new Contact;
        $this->setProperty($contact, 'url', $url);
        $result = $contact->getUrl();

        $this->assertEquals($url, $result);
    }

    public function testSetUrlSetsUrl()
    {
        $url = 'http://black.tld/jane';

        $contact = new Contact;
        $contact->setUrl($url);

        $this->assertAttributeEquals($url, 'url', $contact);
    }

    public function testGetEmailReturnsEmail()
    {
        $email = 'jack@black.tld';

        $contact = new Contact;
        $this->setProperty($contact, 'email', $email);
        $result = $contact->getEmail();

        $this->assertEquals($email, $result);
    }

    public function testSetEmailsSetsEmail()
    {
        $email = 'jane@black.tld';

        $contact = new Contact;
        $contact->setEmail($email);

        $this->assertAttributeEquals($email, 'email', $contact);
    }
}
