<?php

namespace AvalancheDevelopment\Approach\Schema;

use AvalancheDevelopment\Approach\TestHelper\SetPropertyTrait;
use PHPUnit_Framework_TestCase;

class ScopesTest extends PHPUnit_Framework_TestCase
{

    use SetPropertyTrait;

    public function testGetScopesReturnsScopes()
    {
        $scopeList = [ 'read:awesome' => 'Read awesome things' ];

        $scopes = new Scopes;
        $this->setProperty($scopes, 'scopes', $scopeList);
        $result = $scopes->getScopes();

        $this->assertEquals($scopeList, $result);
    }

    public function testSetScopesSetsScopes()
    {
        $scopeList = [ 'read:awesome' => 'Read awesome things' ];

        $scopes = new Scopes;
        $scopes->setScopes($scopeList);

        $this->assertAttributeEquals($scopeList, 'scopes', $scopes);
    }
}
