<?php

namespace AvalancheDevelopment\Approach\Schema;

use AvalancheDevelopment\Approach\TestHelper\SetPropertyTrait;
use PHPUnit_Framework_TestCase;

class HeaderTest extends PHPUnit_Framework_TestCase
{

    use SetPropertyTrait;

    public function testGetDescriptionReturnsDescription()
    {
        $description = 'A description of the header';

        $header = new Header;
        $this->setProperty($header, 'description', $description);
        $result = $header->getDescription();

        $this->assertEquals($description, $result);
    }

    public function testSetDescriptionSetsDescription()
    {
        $description = 'A description of the header';

        $header = new Header;
        $header->setDescription($description);

        $this->assertAttributeEquals($description, 'description', $header);
    }

    public function testGetTypeReturnsType()
    {
        $type = 'string';

        $header = new Header;
        $this->setProperty($header, 'type', $type);
        $result = $header->getType();

        $this->assertEquals($type, $result);
    }

    public function testSetTypeSetsType()
    {
        $type = 'string';

        $header = new Header;
        $header->setType($type);

        $this->assertAttributeEquals($type, 'type', $header);
    }

    public function testGetFormatReturnsFormat()
    {
        $format = 'date';

        $header = new Header;
        $this->setProperty($header, 'format', $format);
        $result = $header->getFormat();

        $this->assertEquals($format, $result);
    }

    public function testSetFormatSetsFormat()
    {
        $format = 'date';

        $header = new Header;
        $header->setFormat($format);

        $this->assertAttributeEquals($format, 'format', $header);
    }

    public function testGetItemsReturnsItems()
    {
        $items = new Items;

        $header = new Header;
        $this->setProperty($header, 'items', $items);
        $result = $header->getItems();

        $this->assertSame($items, $result);
    }

    public function testSetItemsSetsItems()
    {
        $items = new Items;

        $header = new Header;
        $header->setItems($items);

        $this->assertAttributeSame($items, 'items', $header);
    }

    public function testGetCollectionFormatReturnsCollectionFormat()
    {
        $collectionFormat = 'csv';

        $header = new Header;
        $this->setProperty($header, 'collectionFormat', $collectionFormat);
        $result = $header->getCollectionFormat();

        $this->assertEquals($collectionFormat, $result);
    }

    public function testSetCollectionFormatSetsCollectionFormat()
    {
        $collectionFormat = 'csv';

        $header = new Header;
        $header->setCollectionFormat($collectionFormat);

        $this->assertAttributeEquals($collectionFormat, 'collectionFormat', $header);
    }

    public function testGetDefaultReturnsDefault()
    {
        $default = 'default';

        $header = new Header;
        $this->setProperty($header, 'default', $default);
        $result = $header->getDefault();

        $this->assertEquals($default, $result);
    }

    public function testSetDefaultSetsDefault()
    {
        $default = 'default';

        $header = new Header;
        $header->setDefault($default);

        $this->assertAttributeEquals($default, 'default', $header);
    }

    public function testGetMaximumReturnsMaximum()
    {
        $maximum = 30;

        $header = new Header;
        $this->setProperty($header, 'maximum', $maximum);
        $result = $header->getMaximum();

        $this->assertEquals($maximum, $result);
    }

    public function testSetMaximumSetsMaximum()
    {
        $maximum = 30;

        $header = new Header;
        $header->setMaximum($maximum);

        $this->assertAttributeEquals($maximum, 'maximum', $header);
    }

    public function testGetExclusiveMaximumReturnsExclusiveMaximum()
    {
        $exclusiveMaximum = true;

        $header = new Header;
        $this->setProperty($header, 'exclusiveMaximum', $exclusiveMaximum);
        $result = $header->getExclusiveMaximum();

        $this->assertEquals($exclusiveMaximum, $result);
    }

    public function testSetExclusiveMaximumSetsExclusiveMaximum()
    {
        $exclusiveMaximum = true;

        $header = new Header;
        $header->setExclusiveMaximum($exclusiveMaximum);

        $this->assertAttributeEquals($exclusiveMaximum, 'exclusiveMaximum', $header);
    }

    public function testGetMinimumReturnsMinimum()
    {
        $minimum = 3;

        $header = new Header;
        $this->setProperty($header, 'minimum', $minimum);
        $result = $header->getMinimum();

        $this->assertEquals($minimum, $result);
    }

    public function testSetMinimumSetsMinimum()
    {
        $minimum = 3;

        $header = new Header;
        $header->setMinimum($minimum);

        $this->assertAttributeEquals($minimum, 'minimum', $header);
    }

    public function testGetExclusiveMinimumReturnsExclusiveMinimum()
    {
        $exclusiveMinimum = false;

        $header = new Header;
        $this->setProperty($header, 'exclusiveMinimum', $exclusiveMinimum);
        $result = $header->getExclusiveMinimum();

        $this->assertEquals($exclusiveMinimum, $result);
    }

    public function testSetExclusiveMinimumSetsExclusiveMinimum()
    {
        $exclusiveMinimum = false;

        $header = new Header;
        $header->setExclusiveMinimum($exclusiveMinimum);

        $this->assertAttributeEquals($exclusiveMinimum, 'exclusiveMinimum', $header);
    }

    public function testGetMaxLengthReturnsMaxLength()
    {
        $maxLength = 10;

        $header = new Header;
        $this->setProperty($header, 'maxLength', $maxLength);
        $result = $header->getMaxLength();

        $this->assertEquals($maxLength, $result);
    }

    public function testSetMaxLengthSetsMaxLength()
    {
        $maxLength = 10;

        $header = new Header;
        $header->setMaxLength($maxLength);

        $this->assertAttributeEquals($maxLength, 'maxLength', $header);
    }

    public function testGetMinLengthReturnsMinLength()
    {
        $minLength = 2;

        $header = new Header;
        $this->setProperty($header, 'minLength', $minLength);
        $result = $header->getMinLength();

        $this->assertEquals($minLength, $result);
    }

    public function testSetMinLengthSetsMinLength()
    {
        $minLength = 2;

        $header = new Header;
        $header->setMinLength($minLength);

        $this->assertAttributeEquals($minLength, 'minLength', $header);
    }

    public function testGetPatternReturnsPattern()
    {
        $pattern = 'some-pattern';

        $header = new Header;
        $this->setProperty($header, 'pattern', $pattern);
        $result = $header->getPattern();

        $this->assertEquals($pattern, $result);
    }

    public function testSetPatternSetsPattern()
    {
        $pattern = 'some-pattern';

        $header = new Header;
        $header->setPattern($pattern);

        $this->assertAttributeEquals($pattern, 'pattern', $header);
    }

    public function testGetMaxItemsReturnsMaxItems()
    {
        $maxItems = 2;

        $header = new Header;
        $this->setProperty($header, 'maxItems', $maxItems);
        $result = $header->getMaxItems();

        $this->assertEquals($maxItems, $result);
    }

    public function testSetMaxItemsSetsMaxItems()
    {
        $maxItems = 2;

        $header = new Header;
        $header->setMaxItems($maxItems);

        $this->assertAttributeEquals($maxItems, 'maxItems', $header);
    }

    public function testGetMinItemsReturnsMinItems()
    {
        $minItems = 1;

        $header = new Header;
        $this->setProperty($header, 'minItems', $minItems);
        $result = $header->getMinItems();

        $this->assertEquals($minItems, $result);
    }

    public function testSetMinItemsSetsMinItems()
    {
        $minItems = 1;

        $header = new Header;
        $header->setMinItems($minItems);

        $this->assertAttributeEquals($minItems, 'minItems', $header);
    }

    public function testGetUniqueItemsReturnsUniqueItems()
    {
        $uniqueItems = true;

        $header = new Header;
        $this->setProperty($header, 'uniqueItems', $uniqueItems);
        $result = $header->getUniqueItems();

        $this->assertEquals($uniqueItems, $result);
    }

    public function testSetUniqueItemsSetsUniqueItems()
    {
        $uniqueItems = true;

        $header = new Header;
        $header->setUniqueItems($uniqueItems);

        $this->assertAttributeEquals($uniqueItems, 'uniqueItems', $header);
    }

    public function testGetEnumReturnsEnum()
    {
        $enum = [ 'value' ];

        $header = new Header;
        $this->setProperty($header, 'enum', $enum);
        $result = $header->getEnum();

        $this->assertEquals($enum, $result);
    }

    public function testSetEnumSetsEnum()
    {
        $enum = [ 'value' ];

        $header = new Header;
        $header->setEnum($enum);

        $this->assertAttributeEquals($enum, 'enum', $header);
    }

    public function testGetMultipleOfReturnsMultipleOf()
    {
        $multipleOf = 2;

        $header = new Header;
        $this->setProperty($header, 'multipleOf', $multipleOf);
        $result = $header->getMultipleOf();

        $this->assertEquals($multipleOf, $result);
    }

    public function testSetMultipleOfSetsMultipleOf()
    {
        $multipleOf = 2;

        $header = new Header;
        $header->setMultipleOf($multipleOf);

        $this->assertAttributeEquals($multipleOf, 'multipleOf', $header);
    }
}
