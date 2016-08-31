<?php

namespace AvalancheDevelopment\Approach\Schema;

use AvalancheDevelopment\Approach\TestHelper\SetPropertyTrait;
use PHPUnit_Framework_TestCase;

class ResponseTest extends PHPUnit_Framework_TestCase
{

    use SetPropertyTrait;

    public function testGetDescriptionReturnsDescription()
    {
        $description = 'Success';

        $response = new Response;
        $this->setProperty($response, 'description', $description);
        $result = $response->getDescription();

        $this->assertEquals($description, $result);
    }

    public function testSetDescriptionSetsDescription()
    {
        $description = 'Success';

        $response = new Response;
        $response->setDescription($description);

        $this->assertAttributeEquals($description, 'description', $response);
    }

    public function testGetSchemaReturnsSchema()
    {
        $schema = new Schema;

        $response = new Response;
        $this->setProperty($response, 'schema', $schema);
        $result = $response->getSchema();

        $this->assertSame($schema, $result);
    }

    public function testSetSchemaSetsSchema()
    {
        $schema = new Schema;

        $response = new Response;
        $response->setSchema($schema);

        $this->assertAttributeSame($schema, 'schema', $response);
    }

    public function testGetHeadersReturnsHeaders()
    {
        $headers = new Headers;

        $response = new Response;
        $this->setProperty($response, 'headers', $headers);
        $result = $response->getHeaders();

        $this->assertSame($headers, $result);
    }

    public function testSetHeadersSetsHeaders()
    {
        $headers = new Headers;

        $response = new Response;
        $response->setHeaders($headers);

        $this->assertAttributeSame($headers, 'headers', $response);
    }

    public function testGetExampleReturnsExample()
    {
        $examples = new Example;

        $response = new Response;
        $this->setProperty($response, 'examples', $examples);
        $result = $response->getExample();

        $this->assertSame($examples, $result);
    }

    public function testSetExampleSetsExample()
    {
        $examples = new Example;

        $response = new Response;
        $response->setExample($examples);

        $this->assertAttributeSame($examples, 'examples', $response);
    }
}
