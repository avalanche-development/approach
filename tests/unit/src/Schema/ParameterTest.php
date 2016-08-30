<?php

namespace AvalancheDevelopment\Approach\Schema;

use AvalancheDevelopment\Approach\TestHelper\SetPropertyTrait;
use PHPUnit_Framework_TestCase;

class ParameterTest extends PHPUnit_Framework_TestCase
{

    use SetPropertyTrait;

    public function testGetNameReturnsName()
    {
        $name = 'resourceId';

        $parameter = new Parameter;
        $this->setProperty($parameter, 'name', $name);
        $result = $parameter->getName();

        $this->assertEquals($name, $result);
    }

    public function testSetNameSetsName()
    {
        $name = 'resourceId';

        $parameter = new Parameter;
        $parameter->setName($name);

        $this->assertAttributeEquals($name, 'name', $parameter);
    }

    public function testGetInReturnsIn()
    {
        $in = 'path';

        $parameter = new Parameter;
        $this->setProperty($parameter, 'in', $in);
        $result = $parameter->getIn();

        $this->assertEquals($in, $result);
    }

    public function testSetInSetsIn()
    {
        $in = 'path';

        $parameter = new Parameter;
        $parameter->setIn($in);

        $this->assertAttributeEquals($in, 'in', $parameter);
    }

    public function testGetDescriptionReturnsDescription()
    {
        $description = 'A description of the parameter';

        $parameter = new Parameter;
        $this->setProperty($parameter, 'description', $description);
        $result = $parameter->getDescription();

        $this->assertEquals($description, $result);
    }

    public function testSetDescriptionSetsDescription()
    {
        $description = 'A description of the parameter';

        $parameter = new Parameter;
        $parameter->setDescription($description);

        $this->assertAttributeEquals($description, 'description', $parameter);
    }

    public function testGetRequiredReturnsRequired()
    {
        $required = true;

        $parameter = new Parameter;
        $this->setProperty($parameter, 'required', $required);
        $result = $parameter->getRequired();

        $this->assertEquals($required, $result);
    }

    public function testSetRequiredSetsRequired()
    {
        $required = true;

        $parameter = new Parameter;
        $parameter->setRequired($required);

        $this->assertAttributeEquals($required, 'required', $parameter);
    }

    public function testGetSchemaReturnsSchema()
    {
        $schema = new Schema;

        $parameter = new Parameter;
        $this->setProperty($parameter, 'schema', $schema);
        $result = $parameter->getSchema();

        $this->assertEquals($schema, $result);
    }

    public function testSetSchemaSetsSchema()
    {
        $schema = new Schema;

        $parameter = new Parameter;
        $parameter->setSchema($schema);

        $this->assertAttributeEquals($schema, 'schema', $parameter);
    }

    public function testGetTypeReturnsType()
    {
        $type = 'string';

        $parameter = new Parameter;
        $this->setProperty($parameter, 'type', $type);
        $result = $parameter->getType();

        $this->assertEquals($type, $result);
    }

    public function testSetTypeSetsType()
    {
        $type = 'string';

        $parameter = new Parameter;
        $parameter->setType($type);

        $this->assertAttributeEquals($type, 'type', $parameter);
    }

    public function testGetFormatReturnsFormat()
    {
        $format = 'date';

        $parameter = new Parameter;
        $this->setProperty($parameter, 'format', $format);
        $result = $parameter->getFormat();

        $this->assertEquals($format, $result);
    }

    public function testSetFormatSetsFormat()
    {
        $format = 'date';

        $parameter = new Parameter;
        $parameter->setFormat($format);

        $this->assertAttributeEquals($format, 'format', $parameter);
    }

    public function testGetAllowEmptyValueReturnsAllowEmptyValue()
    {
        $allowEmptyValue = false;

        $parameter = new Parameter;
        $this->setProperty($parameter, 'allowEmptyValue', $allowEmptyValue);
        $result = $parameter->getAllowEmptyValue();

        $this->assertEquals($allowEmptyValue, $result);
    }

    public function testSetAllowEmptyValueSetsAllowEmptyValue()
    {
        $allowEmptyValue = false;

        $parameter = new Parameter;
        $parameter->setAllowEmptyValue($allowEmptyValue);

        $this->assertAttributeEquals($allowEmptyValue, 'allowEmptyValue', $parameter);
    }

    public function testGetItemsReturnsItems()
    {
        $items = new Items;

        $parameter = new Parameter;
        $this->setProperty($parameter, 'items', $items);
        $result = $parameter->getItems();

        $this->assertEquals($items, $result);
    }

    public function testSetItemsSetsItems()
    {
        $items = new Items;

        $parameter = new Parameter;
        $parameter->setItems($items);

        $this->assertAttributeEquals($items, 'items', $parameter);
    }

    public function testGetCollectionFormatReturnsCollectionFormat()
    {
        $collectionFormat = 'csv';

        $parameter = new Parameter;
        $this->setProperty($parameter, 'collectionFormat', $collectionFormat);
        $result = $parameter->getCollectionFormat();

        $this->assertEquals($collectionFormat, $result);
    }

    public function testSetCollectionFormatSetsCollectionFormat()
    {
        $collectionFormat = 'csv';

        $parameter = new Parameter;
        $parameter->setCollectionFormat($collectionFormat);

        $this->assertAttributeEquals($collectionFormat, 'collectionFormat', $parameter);
    }

    public function testGetDefaultReturnsDefault()
    {
        $default = 'default';

        $parameter = new Parameter;
        $this->setProperty($parameter, 'default', $default);
        $result = $parameter->getDefault();

        $this->assertEquals($default, $result);
    }

    public function testSetDefaultSetsDefault()
    {
        $default = 'default';

        $parameter = new Parameter;
        $parameter->setDefault($default);

        $this->assertAttributeEquals($default, 'default', $parameter);
    }

    public function testGetMaximumReturnsMaximum()
    {
        $maximum = 30;

        $parameter = new Parameter;
        $this->setProperty($parameter, 'maximum', $maximum);
        $result = $parameter->getMaximum();

        $this->assertEquals($maximum, $result);
    }

    public function testSetMaximumSetsMaximum()
    {
        $maximum = 30;

        $parameter = new Parameter;
        $parameter->setMaximum($maximum);

        $this->assertAttributeEquals($maximum, 'maximum', $parameter);
    }

    public function testGetExclusiveMaximumReturnsExclusiveMaximum()
    {
        $exclusiveMaximum = true;

        $parameter = new Parameter;
        $this->setProperty($parameter, 'exclusiveMaximum', $exclusiveMaximum);
        $result = $parameter->getExclusiveMaximum();

        $this->assertEquals($exclusiveMaximum, $result);
    }

    public function testSetExclusiveMaximumSetsExclusiveMaximum()
    {
        $exclusiveMaximum = true;

        $parameter = new Parameter;
        $parameter->setExclusiveMaximum($exclusiveMaximum);

        $this->assertAttributeEquals($exclusiveMaximum, 'exclusiveMaximum', $parameter);
    }

    public function testGetMinimumReturnsMinimum()
    {
        $minimum = 3;

        $parameter = new Parameter;
        $this->setProperty($parameter, 'minimum', $minimum);
        $result = $parameter->getMinimum();

        $this->assertEquals($minimum, $result);
    }

    public function testSetMinimumSetsMinimum()
    {
        $minimum = 3;

        $parameter = new Parameter;
        $parameter->setMinimum($minimum);

        $this->assertAttributeEquals($minimum, 'minimum', $parameter);
    }

    public function testGetExclusiveMinimumReturnsExclusiveMinimum()
    {
        $exclusiveMinimum = false;

        $parameter = new Parameter;
        $this->setProperty($parameter, 'exclusiveMinimum', $exclusiveMinimum);
        $result = $parameter->getExclusiveMinimum();

        $this->assertEquals($exclusiveMinimum, $result);
    }

    public function testSetExclusiveMinimumSetsExclusiveMinimum()
    {
        $exclusiveMinimum = false;

        $parameter = new Parameter;
        $parameter->setExclusiveMinimum($exclusiveMinimum);

        $this->assertAttributeEquals($exclusiveMinimum, 'exclusiveMinimum', $parameter);
    }

    public function testGetMaxLengthReturnsMaxLength()
    {
        $maxLength = 10;

        $parameter = new Parameter;
        $this->setProperty($parameter, 'maxLength', $maxLength);
        $result = $parameter->getMaxLength();

        $this->assertEquals($maxLength, $result);
    }

    public function testSetMaxLengthSetsMaxLength()
    {
        $maxLength = 10;

        $parameter = new Parameter;
        $parameter->setMaxLength($maxLength);

        $this->assertAttributeEquals($maxLength, 'maxLength', $parameter);
    }

    public function testGetMinLengthReturnsMinLength()
    {
        $minLength = 2;

        $parameter = new Parameter;
        $this->setProperty($parameter, 'minLength', $minLength);
        $result = $parameter->getMinLength();

        $this->assertEquals($minLength, $result);
    }

    public function testSetMinLengthSetsMinLength()
    {
        $minLength = 2;

        $parameter = new Parameter;
        $parameter->setMinLength($minLength);

        $this->assertAttributeEquals($minLength, 'minLength', $parameter);
    }

    public function testGetPatternReturnsPattern()
    {
        $pattern = 'some-pattern';

        $parameter = new Parameter;
        $this->setProperty($parameter, 'pattern', $pattern);
        $result = $parameter->getPattern();

        $this->assertEquals($pattern, $result);
    }

    public function testSetPatternSetsPattern()
    {
        $pattern = 'some-pattern';

        $parameter = new Parameter;
        $parameter->setPattern($pattern);

        $this->assertAttributeEquals($pattern, 'pattern', $parameter);
    }

    public function testGetMaxItemsReturnsMaxItems()
    {
        $maxItems = 2;

        $parameter = new Parameter;
        $this->setProperty($parameter, 'maxItems', $maxItems);
        $result = $parameter->getMaxItems();

        $this->assertEquals($maxItems, $result);
    }

    public function testSetMaxItemsSetsMaxItems()
    {
        $maxItems = 2;

        $parameter = new Parameter;
        $parameter->setMaxItems($maxItems);

        $this->assertAttributeEquals($maxItems, 'maxItems', $parameter);
    }

    public function testGetMinItemsReturnsMinItems()
    {
        $minItems = 1;

        $parameter = new Parameter;
        $this->setProperty($parameter, 'minItems', $minItems);
        $result = $parameter->getMinItems();

        $this->assertEquals($minItems, $result);
    }

    public function testSetMinItemsSetsMinItems()
    {
        $minItems = 1;

        $parameter = new Parameter;
        $parameter->setMinItems($minItems);

        $this->assertAttributeEquals($minItems, 'minItems', $parameter);
    }

    public function testGetUniqueItemsReturnsUniqueItems()
    {
        $uniqueItems = true;

        $parameter = new Parameter;
        $this->setProperty($parameter, 'uniqueItems', $uniqueItems);
        $result = $parameter->getUniqueItems();

        $this->assertEquals($uniqueItems, $result);
    }

    public function testSetUniqueItemsSetsUniqueItems()
    {
        $uniqueItems = true;

        $parameter = new Parameter;
        $parameter->setUniqueItems($uniqueItems);

        $this->assertAttributeEquals($uniqueItems, 'uniqueItems', $parameter);
    }

    public function testGetEnumReturnsEnum()
    {
        $enum = [ 'value' ];

        $parameter = new Parameter;
        $this->setProperty($parameter, 'enum', $enum);
        $result = $parameter->getEnum();

        $this->assertEquals($enum, $result);
    }

    public function testSetEnumSetsEnum()
    {
        $enum = [ 'value' ];

        $parameter = new Parameter;
        $parameter->setEnum($enum);

        $this->assertAttributeEquals($enum, 'enum', $parameter);
    }

    public function testGetMultipleOfReturnsMultipleOf()
    {
        $multipleOf = 2;

        $parameter = new Parameter;
        $this->setProperty($parameter, 'multipleOf', $multipleOf);
        $result = $parameter->getMultipleOf();

        $this->assertEquals($multipleOf, $result);
    }

    public function testSetMultipleOfSetsMultipleOf()
    {
        $multipleOf = 2;

        $parameter = new Parameter;
        $parameter->setMultipleOf($multipleOf);

        $this->assertAttributeEquals($multipleOf, 'multipleOf', $parameter);
    }
}
