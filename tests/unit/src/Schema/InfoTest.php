<?php

namespace AvalancheDevelopment\Approach\Schema;

use AvalancheDevelopment\Approach\TestHelper\SetPropertyTrait;
use PHPUnit_Framework_TestCase;
use ReflectionClass;

class InfoTest extends PHPUnit_Framework_TestCase
{

    use SetPropertyTrait;

    public function testGetTitleReturnsTitle()
    {
        $title = 'An Awesome Title';

        $info = new Info;
        $this->setProperty($info, 'title', $title);
        $result = $info->getTitle();

        $this->assertEquals($title, $result);
    }

    public function testSetTitleSetsTitle()
    {
        $title = 'An Awesome Title';

        $info = new Info;
        $info->setTitle($title);

        $this->assertAttributeEquals($title, 'title', $info);
    }

    public function testGetDescriptionReturnsDescription()
    {
        $description = 'An Awesome Description';

        $info = new Info;
        $this->setProperty($info, 'description', $description);
        $result = $info->getDescription();

        $this->assertEquals($description, $result);
    }

    public function testSetDescriptionSetsDescription()
    {
        $description = 'An Awesome Description';

        $info = new Info;
        $info->setDescription($description);

        $this->assertAttributeEquals($description, 'description', $info);
    }

    public function testGetTermsOfServiceReturnsTermsOfService()
    {
        $termsOfService = 'http://black.tld/terms';

        $info = new Info;
        $this->setProperty($info, 'termsOfService', $termsOfService);
        $result = $info->getTermsOfService();

        $this->assertEquals($termsOfService, $result);
    }

    public function testSetTermsOfServiceSetsTermsOfService()
    {
        $termsOfService = 'http://black.tld/terms';

        $info = new Info;
        $info->setTermsOfService($termsOfService);

        $this->assertAttributeEquals($termsOfService, 'termsOfService', $info);
    }

    public function testGetContactReturnsContact()
    {
        $contact = new Contact;

        $info = new Info;
        $this->setProperty($info, 'contact', $contact);
        $result = $info->getContact();

        $this->assertEquals($contact, $result);
    }

    public function testSetContactSetsContact()
    {
        $contact = new Contact;

        $info = new Info;
        $info->setContact($contact);

        $this->assertAttributeEquals($contact, 'contact', $info);
    }

    public function testGetLicenseReturnsLicense()
    {
        $license = new License;

        $info = new Info;
        $this->setProperty($info, 'license', $license);
        $result = $info->getLicense();

        $this->assertEquals($license, $result);
    }

    public function testSetLicenseSetsLicense()
    {
        $license = new License;

        $info = new Info;
        $info->setLicense($license);

        $this->assertAttributeEquals($license, 'license', $info);
    }

    public function testGetVersionReturnsVersion()
    {
        $version = '1.0.0';

        $info = new Info;
        $this->setProperty($info, 'version', $version);
        $result = $info->getVersion();

        $this->assertEquals($version, $result);
    }

    public function testSetVersionSetsVersion()
    {
        $version = '1.0.0';

        $info = new Info;
        $info->setVersion($version);

        $this->assertAttributeEquals($version, 'version', $info);
    }
}
