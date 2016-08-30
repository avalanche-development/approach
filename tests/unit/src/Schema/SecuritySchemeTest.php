<?php

namespace AvalancheDevelopment\Approach\Schema;

use AvalancheDevelopment\Approach\TestHelper\SetPropertyTrait;
use PHPUnit_Framework_TestCase;

class SecuritySchemeTest extends PHPUnit_Framework_TestCase
{

    use SetPropertyTrait;

    public function testGetTypeReturnsType()
    {
        $type = 'basic';

        $securityScheme = new SecurityScheme;
        $this->setProperty($securityScheme, 'type', $type);
        $result = $securityScheme->getType();

        $this->assertEquals($type, $result);
    }

    public function testSetTypeSetsType()
    {
        $type = 'basic';

        $securityScheme = new SecurityScheme;
        $securityScheme->setType($type);

        $this->assertAttributeEquals($type, 'type', $securityScheme);
    }

    public function testGetDescriptionReturnsDescription()
    {
        $description = 'Basic auth for a basic app';

        $securityScheme = new SecurityScheme;
        $this->setProperty($securityScheme, 'description', $description);
        $result = $securityScheme->getDescription();

        $this->assertEquals($description, $result);
    }

    public function testSetDescriptionSetsDescription()
    {
        $description = 'Basic auth for a basic app';

        $securityScheme = new SecurityScheme;
        $securityScheme->setDescription($description);

        $this->assertAttributeEquals($description, 'description', $securityScheme);
    }

    public function testGetNameReturnsName()
    {
        $name = 'Auth';

        $securityScheme = new SecurityScheme;
        $this->setProperty($securityScheme, 'name', $name);
        $result = $securityScheme->getName();

        $this->assertEquals($name, $result);
    }

    public function testSetNameSetsName()
    {
        $name = 'Auth';

        $securityScheme = new SecurityScheme;
        $securityScheme->setName($name);

        $this->assertAttributeEquals($name, 'name', $securityScheme);
    }

    public function testGetInReturnsIn()
    {
        $in = 'header';

        $securityScheme = new SecurityScheme;
        $this->setProperty($securityScheme, 'in', $in);
        $result = $securityScheme->getIn();

        $this->assertEquals($in, $result);
    }

    public function testSetInSetsIn()
    {
        $in = 'header';

        $securityScheme = new SecurityScheme;
        $securityScheme->setIn($in);

        $this->assertAttributeEquals($in, 'in', $securityScheme);
    }

    public function testGetFlowReturnsFlow()
    {
        $flow = 'implicit';

        $securityScheme = new SecurityScheme;
        $this->setProperty($securityScheme, 'flow', $flow);
        $result = $securityScheme->getFlow();

        $this->assertEquals($flow, $result);
    }

    public function testSetFlowSetsFlow()
    {
        $flow = 'implicit';

        $securityScheme = new SecurityScheme;
        $securityScheme->setFlow($flow);

        $this->assertAttributeEquals($flow, 'flow', $securityScheme);
    }

    public function testGetAuthorizationUrlReturnsAuthorizationUrl()
    {
        $authorizationUrl = 'http://domain.tld/auth';

        $securityScheme = new SecurityScheme;
        $this->setProperty($securityScheme, 'authorizationUrl', $authorizationUrl);
        $result = $securityScheme->getAuthorizationUrl();

        $this->assertEquals($authorizationUrl, $result);
    }

    public function testSetAuthorizationUrlSetsAuthorizationUrl()
    {
        $authorizationUrl = 'http://domain.tld/auth';

        $securityScheme = new SecurityScheme;
        $securityScheme->setAuthorizationUrl($authorizationUrl);

        $this->assertAttributeEquals($authorizationUrl, 'authorizationUrl', $securityScheme);
    }

    public function testGetTokenUrlReturnsTokenUrl()
    {
        $tokenUrl = 'http://domain.tld/token';

        $securityScheme = new SecurityScheme;
        $this->setProperty($securityScheme, 'tokenUrl', $tokenUrl);
        $result = $securityScheme->getTokenUrl();

        $this->assertEquals($tokenUrl, $result);
    }

    public function testSetTokenUrlSetsTokenUrl()
    {
        $tokenUrl = 'http://domain.tld/token';

        $securityScheme = new SecurityScheme;
        $securityScheme->setTokenUrl($tokenUrl);

        $this->assertAttributeEquals($tokenUrl, 'tokenUrl', $securityScheme);
    }

    public function testGetScopesReturnsScopes()
    {
        $scopes = new Scopes;

        $securityScheme = new SecurityScheme;
        $this->setProperty($securityScheme, 'scopes', $scopes);
        $result = $securityScheme->getScopes();

        $this->assertEquals($scopes, $result);
    }

    public function testSetScopesSetsScopes()
    {
        $scopes = new Scopes;

        $securityScheme = new SecurityScheme;
        $securityScheme->setScopes($scopes);

        $this->assertAttributeEquals($scopes, 'scopes', $securityScheme);
    }
}
