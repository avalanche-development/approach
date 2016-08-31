<?php

namespace AvalancheDevelopment\Approach\Schema;

use AvalancheDevelopment\Approach\TestHelper\SetPropertyTrait;
use PHPUnit_Framework_TestCase;

class ResponsesDefinitionsTest extends PHPUnit_Framework_TestCase
{

    use SetPropertyTrait;

    public function testGetResponsesReturnsResponses()
    {
        $responses = [ 'NotFound' => new Response ];

        $responsesDefinitions = new ResponsesDefinitions;
        $this->setProperty($responsesDefinitions, 'responses', $responses);
        $result = $responsesDefinitions->getResponses();

        $this->assertEquals($responses, $result);
    }

    public function testSetResponsesSetsResponses()
    {
        $responses = [ 'NotFound' => new Response ];

        $responsesDefinitions = new ResponsesDefinitions;
        $responsesDefinitions->setResponses($responses);

        $this->assertAttributeEquals($responses, 'responses', $responsesDefinitions);
    }
}
