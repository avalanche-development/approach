<?php

namespace AvalancheDevelopment\Approach\Schema;

use AvalancheDevelopment\Approach\TestHelper\SetPropertyTrait;
use PHPUnit_Framework_TestCase;

class HeadersTest extends PHPUnit_Framework_TestCase
{

    use SetPropertyTrait;

    public function testGetHeadersReturnsHeaders()
    {
        $headerList = [ 'X-UserName' => new Header ];

        $headers = new Headers;
        $this->setProperty($headers, 'headers', $headerList);
        $result = $headers->getHeaders();

        $this->assertEquals($headerList, $result);
    }

    public function testSetHeadersSetsHeaders()
    {
        $headerList = [ 'X-UserName' => new Header ];

        $headers = new Headers;
        $headers->setHeaders($headerList);

        $this->assertAttributeEquals($headerList, 'headers', $headers);
    }
}
