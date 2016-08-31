<?php

namespace AvalancheDevelopment\Approach\Schema;

use AvalancheDevelopment\Approach\TestHelper\SetPropertyTrait;
use PHPUnit_Framework_TestCase;

class PathsTest extends PHPUnit_Framework_TestCase
{

    use SetPropertyTrait;

    public function testGetPathItemListReturnsPathItemList()
    {
        $pathList = [ '/resource' => new PathItem ];

        $paths = new Paths;
        $this->setProperty($paths, 'paths', $pathList);
        $result = $paths->getPaths();

        $this->assertEquals($pathList, $result);
    }

    public function testSetPathItemListSetsPathItemList()
    {
        $pathList = [ '/resource' => new PathItem ];

        $paths = new Paths;
        $paths->setPaths($pathList);

        $this->assertAttributeEquals($pathList, 'paths', $paths);
    }
}
