<?php

namespace AvalancheDevelopment\Approach\Schema;

use AvalancheDevelopment\Approach\TestHelper\SetPropertyTrait;
use PHPUnit_Framework_TestCase;

class SecurityRequirementTest extends PHPUnit_Framework_TestCase
{

    use SetPropertyTrait;

    public function testGetSchemesReturnsSchemes()
    {
        $schemes = [ 'api_key' => [] ];

        $securityRequirement = new SecurityRequirement;
        $this->setProperty($securityRequirement, 'schemes', $schemes);
        $result = $securityRequirement->getSchemes();

        $this->assertEquals($schemes, $result);
    }

    public function testSetSchemesSetsSchemes()
    {
        $schemes = [ 'api_key' => [] ];

        $securityRequirement = new SecurityRequirement;
        $securityRequirement->setSchemes($schemes);

        $this->assertAttributeEquals($schemes, 'schemes', $securityRequirement);
    }
}
