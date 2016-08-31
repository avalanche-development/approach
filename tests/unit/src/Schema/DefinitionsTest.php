<?php

namespace AvalancheDevelopment\Approach\Schema;

use AvalancheDevelopment\Approach\TestHelper\SetPropertyTrait;
use PHPUnit_Framework_TestCase;

class DefinitionsTest extends PHPUnit_Framework_TestCase
{

    use SetPropertyTrait;

    public function testGetDataTypesReturnsDataTypes()
    {
        $dataTypes = [ 'Identifier' => new Schema ];

        $definitions = new Definitions;
        $this->setProperty($definitions, 'dataTypes', $dataTypes);
        $result = $definitions->getDataTypes();

        $this->assertEquals($dataTypes, $result);
    }

    public function testSetDataTypesSetsDataTypes()
    {
        $dataTypes = [ 'Identifier' => new Schema ];

        $definitions = new Definitions;
        $definitions->setDataTypes($dataTypes);

        $this->assertAttributeEquals($dataTypes, 'dataTypes', $definitions);
    }
}
