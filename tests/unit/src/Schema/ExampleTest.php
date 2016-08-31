<?php

namespace AvalancheDevelopment\Approach\Schema;

use AvalancheDevelopment\Approach\TestHelper\SetPropertyTrait;
use PHPUnit_Framework_TestCase;

class ExampleTest extends PHPUnit_Framework_TestCase
{

    use SetPropertyTrait;

    public function testGetResponsesReturnsResponses()
    {
        $responses = [ 'name' => 'value' ];

        $example = new Example;
        $this->setProperty($example, 'responses', $responses);
        $result = $example->getResponses();

        $this->assertEquals($responses, $result);
    }

    public function testSetResponsesSetsResponses()
    {
        $responses = [ 'name' => 'value' ];

        $example = new Example;
        $example->setResponses($responses);

        $this->assertAttributeEquals($responses, 'responses', $example);
    }
}
