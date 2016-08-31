<?php

namespace AvalancheDevelopment\Approach\Schema;

use AvalancheDevelopment\Approach\TestHelper\SetPropertyTrait;
use PHPUnit_Framework_TestCase;

class ResponsesTest extends PHPUnit_Framework_TestCase
{

    use SetPropertyTrait;

    public function testGetDefaultReturnsDefault()
    {
        $default = new Response;

        $responses = new Responses;
        $this->setProperty($responses, 'default', $default);
        $result = $responses->getDefault();

        $this->assertEquals($default, $result);
    }

    public function testSetDefaultSetsDefault()
    {
        $default = => new Response;

        $responses = new Responses;
        $responses->setDefault($default);

        $this->assertAttributeEquals($responses, 'responses', $default);
    }

    public function testGetResponsesReturnsResponses()
    {
        $responseList = [ '200' => new Response ];

        $responses = new Responses;
        $this->setProperty($responses, 'responses', $responseList);
        $result = $responses->getResponses();

        $this->assertEquals($responseList, $result);
    }

    public function testSetResponsesSetsResponses()
    {
        $responseList = [ '200' => new Response ];

        $responses = new Responses;
        $responses->setResponses($responseList);

        $this->assertAttributeEquals($responses, 'responses', $responseList);
    }
}
