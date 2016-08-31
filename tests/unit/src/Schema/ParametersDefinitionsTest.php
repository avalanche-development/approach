<?php

namespace AvalancheDevelopment\Approach\Schema;

use AvalancheDevelopment\Approach\TestHelper\SetPropertyTrait;
use PHPUnit_Framework_TestCase;

class ParametersDefinitionsTest extends PHPUnit_Framework_TestCase
{

    use SetPropertyTrait;

    public function testGetParametersReturnsParameters()
    {
        $parameters = [ 'limit' => new Parameter ];

        $parametersDefinitions = new ParametersDefinitions;
        $this->setProperty($parametersDefinitions, 'parameters', $parameters);
        $result = $parametersDefinitions->getParameters();

        $this->assertEquals($parameters, $result);
    }

    public function testSetParametersSetsParameters()
    {
        $parameters = [ 'limit' => new Parameter ];

        $parametersDefinitions = new ParametersDefinitions;
        $parametersDefinitions->setParameters($parameters);

        $this->assertAttributeEquals($parameters, 'parameters', $parametersDefinitions);
    }
}
