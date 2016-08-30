<?php

namespace AvalancheDevelopment\Approach\Schema;

use AvalancheDevelopment\Approach\TestHelper\SetPropertyTrait;
use PHPUnit_Framework_TestCase;

class ItemsTest extends PHPUnit_Framework_TestCase
{

    use SetPropertyTrait;

    public function testGetTypeReturnsType()
    {
        $type = 'string';

        $items = new Items;
        $this->setProperty($items, 'type', $type);
        $result = $items->getType();

        $this->assertEquals($type, $result);
    }

    public function testSetTypeSetsType()
    {
        $type = 'string';

        $items = new Items;
        $items->setType($type);

        $this->assertAttributeEquals($type, 'type', $items);
    }

    public function testGetFormatReturnsFormat()
    {
        $format = 'date';

        $items = new Items;
        $this->setProperty($items, 'format', $format);
        $result = $items->getFormat();

        $this->assertEquals($format, $result);
    }

    public function testSetFormatSetsFormat()
    {
        $format = 'date';

        $items = new Items;
        $items->setFormat($format);

        $this->assertAttributeEquals($format, 'format', $items);
    }

    public function testGetItemsReturnsItems()
    {
        $arrayItems = new Items;

        $items = new Items;
        $this->setProperty($items, 'items', $arrayItems);
        $result = $items->getItems();

        $this->assertSame($arrayItems, $result);
    }

    public function testSetItemsSetsItems()
    {
        $arrayItems = new Items;

        $items = new Items;
        $items->setItems($arrayItems);

        $this->assertAttributeSame($arrayItems, 'items', $items);
    }

    public function testGetCollectionFormatReturnsCollectionFormat()
    {
        $collectionFormat = 'csv';

        $items = new Items;
        $this->setProperty($items, 'collectionFormat', $collectionFormat);
        $result = $items->getCollectionFormat();

        $this->assertEquals($collectionFormat, $result);
    }

    public function testSetCollectionFormatSetsCollectionFormat()
    {
        $collectionFormat = 'csv';

        $items = new Items;
        $items->setCollectionFormat($collectionFormat);

        $this->assertAttributeEquals($collectionFormat, 'collectionFormat', $items);
    }

    public function testGetDefaultReturnsDefault()
    {
        $default = 'default';

        $items = new Items;
        $this->setProperty($items, 'default', $default);
        $result = $items->getDefault();

        $this->assertEquals($default, $result);
    }

    public function testSetDefaultSetsDefault()
    {
        $default = 'default';

        $items = new Items;
        $items->setDefault($default);

        $this->assertAttributeEquals($default, 'default', $items);
    }

    public function testGetMaximumReturnsMaximum()
    {
        $maximum = 10;

        $items = new Items;
        $this->setProperty($items, 'maximum', $maximum);
        $result = $items->getMaximum();

        $this->assertEquals($maximum, $result);
    }

    public function testSetMaximumSetsMaximum()
    {
        $maximum = 10;

        $items = new Items;
        $items->setMaximum($maximum);

        $this->assertAttributeEquals($maximum, 'maximum', $items);
    }

    public function testGetExclusiveMaximumReturnsExclusiveMaximum()
    {
        $exclusiveMaximum = true;

        $items = new Items;
        $this->setProperty($items, 'exclusiveMaximum', $exclusiveMaximum);
        $result = $items->getExclusiveMaximum();

        $this->assertEquals($exclusiveMaximum, $result);
    }

    public function testSetExclusiveMaximumSetsExclusiveMaximum()
    {
        $exclusiveMaximum = true;

        $items = new Items;
        $items->setExclusiveMaximum($exclusiveMaximum);

        $this->assertAttributeEquals($exclusiveMaximum, 'exclusiveMaximum', $items);
    }

    public function testGetMinimumReturnsMinimum()
    {
        $minimum = 1;

        $items = new Items;
        $this->setProperty($items, 'minimum', $minimum);
        $result = $items->getMinimum();

        $this->assertEquals($minimum, $result);
    }

    public function testSetMinimumSetsMinimum()
    {
        $minimum = 1;

        $items = new Items;
        $items->setMinimum($minimum);

        $this->assertAttributeEquals($minimum, 'minimum', $items);
    }

    public function testGetExclusiveMinimumReturnsExclusiveMinimum()
    {
        $exclusiveMinimum = true;

        $items = new Items;
        $this->setProperty($items, 'exclusiveMinimum', $exclusiveMinimum);
        $result = $items->getExclusiveMinimum();

        $this->assertEquals($exclusiveMinimum, $result);
    }

    public function testSetExclusiveMinimumSetsExclusiveMinimum()
    {
        $exclusiveMinimum = true;

        $items = new Items;
        $items->setExclusiveMinimum($exclusiveMinimum);

        $this->assertAttributeEquals($exclusiveMinimum, 'exclusiveMinimum', $items);
    }

    public function testGetMaxLengthReturnsMaxLength()
    {
        $maxLength = 25;

        $items = new Items;
        $this->setProperty($items, 'maxLength', $maxLength);
        $result = $items->getMaxLength();

        $this->assertEquals($maxLength, $result);
    }

    public function testSetMaxLengthSetsMaxLength()
    {
        $maxLength = 25;

        $items = new Items;
        $items->setMaxLength($maxLength);

        $this->assertAttributeEquals($maxLength, 'maxLength', $items);
    }

    public function testGetMinLengthReturnsMinLength()
    {
        $minLength = 5;

        $items = new Items;
        $this->setProperty($items, 'minLength', $minLength);
        $result = $items->getMinLength();

        $this->assertEquals($minLength, $result);
    }

    public function testSetMinLengthSetsMinLength()
    {
        $minLength = 5;

        $items = new Items;
        $items->setMinLength($minLength);

        $this->assertAttributeEquals($minLength, 'minLength', $items);
    }

    public function testGetPatternReturnsPattern()
    {
        $pattern = 'some-pattern';

        $items = new Items;
        $this->setProperty($items, 'pattern', $pattern);
        $result = $items->getPattern();

        $this->assertEquals($pattern, $result);
    }

    public function testSetPatternSetsPattern()
    {
        $pattern = 'some-pattern';

        $items = new Items;
        $items->setPattern($pattern);

        $this->assertAttributeEquals($pattern, 'pattern', $items);
    }

    public function testGetMaxItemsReturnsMaxItems()
    {
        $maxItems = 5;

        $items = new Items;
        $this->setProperty($items, 'maxItems', $maxItems);
        $result = $items->getMaxItems();

        $this->assertEquals($maxItems, $result);
    }

    public function testSetMaxItemsSetsMaxItems()
    {
        $maxItems = 5;

        $items = new Items;
        $items->setMaxItems($maxItems);

        $this->assertAttributeEquals($maxItems, 'maxItems', $items);
    }

    public function testGetMinItemsReturnsMinItems()
    {
        $minItems = 1;

        $items = new Items;
        $this->setProperty($items, 'minItems', $minItems);
        $result = $items->getMinItems();

        $this->assertEquals($minItems, $result);
    }

    public function testSetMinItemsSetsMinItems()
    {
        $minItems = 1;

        $items = new Items;
        $items->setMinItems($minItems);

        $this->assertAttributeEquals($minItems, 'minItems', $items);
    }

    public function testGetUniqueItemsReturnsUniqueItems()
    {
        $uniqueItems = false;

        $items = new Items;
        $this->setProperty($items, 'uniqueItems', $uniqueItems);
        $result = $items->getUniqueItems();

        $this->assertEquals($uniqueItems, $result);
    }

    public function testSetUniqueItemsSetsUniqueItems()
    {
        $uniqueItems = false;

        $items = new Items;
        $items->setUniqueItems($uniqueItems);

        $this->assertAttributeEquals($uniqueItems, 'uniqueItems', $items);
    }

    public function testGetEnumReturnsEnum()
    {
        $enum = [
            'one',
            'two',
        ];

        $items = new Items;
        $this->setProperty($items, 'enum', $enum);
        $result = $items->getEnum();

        $this->assertEquals($enum, $result);
    }

    public function testSetEnumSetsEnum()
    {
        $enum = [
            'one',
            'two',
        ];

        $items = new Items;
        $items->setEnum($enum);

        $this->assertAttributeEquals($enum, 'enum', $items);
    }

    public function testGetMultipleOfReturnsMultipleOf()
    {
        $multipleOf = 3;

        $items = new Items;
        $this->setProperty($items, 'multipleOf', $multipleOf);
        $result = $items->getMultipleOf();

        $this->assertEquals($multipleOf, $result);
    }

    public function testSetMultipleOfSetsMultipleOf()
    {
        $multipleOf = 3;

        $items = new Items;
        $items->setMultipleOf($multipleOf);

        $this->assertAttributeEquals($multipleOf, 'multipleOf', $items);
    }
}
