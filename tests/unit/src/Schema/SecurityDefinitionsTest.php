<?php

namespace AvalancheDevelopment\Approach\Schema;

use AvalancheDevelopment\Approach\TestHelper\SetPropertyTrait;
use PHPUnit_Framework_TestCase;

class SecurityDefinitionsTest extends PHPUnit_Framework_TestCase
{

    use SetPropertyTrait;

    public function testGetSchemesReturnsSchemes()
    {
        $schemes = [ 'api_key' => new SecurityScheme ];

        $securityDefinitions = new SecurityDefinitions;
        $this->setProperty($securityDefinitions, 'schemes', $schemes);
        $result = $securityDefinitions->getSchemes();

        $this->assertEquals($schemes, $result);
    }

    public function testSetSchemesSetsSchemes()
    {
        $schemes = [ 'api_key' => new SecurityScheme ];

        $securityDefinitions = new SecurityDefinitions;
        $securityDefinitions->setSchemes($schemes);

        $this->assertAttributeEquals($schemes, 'schemes', $securityDefinitions);
    }
}
