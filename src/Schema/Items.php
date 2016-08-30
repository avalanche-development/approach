<?php

namespace AvalancheDevelopment\Approach\Schema;

use AvalancheDevelopment\Approach\Schema\Part\Extensions;

class Items
{

    use Extensions;

    /** @var string */
    protected $type;

    /** @var string */
    protected $format;

    /** @var Items */
    protected $items;

    /** @var string */
    protected $collectionFormat;

    /** @var array */
    protected $default;

    /** @var float */
    protected $maximum;

    /** @var boolean */
    protected $exclusiveMaximum;

    /** @var float */
    protected $minimum;

    /** @var boolean */
    protected $exclusiveMinimum;

    /** @var integer */
    protected $maxLength;

    /** @var integer */
    protected $minLength;

    /** @var string */
    protected $pattern;

    /** @var integer */
    protected $maxItems;

    /** @var integer */
    protected $minItems;

    /** @var boolean */
    protected $uniqueItems;
    
    /** @var array */
    protected $enum;

    /** @var float */
    protected $multipleOf;

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @param string $format
     */
    public function setFormat($format)
    {
        $this->format = $format;
    }

    /**
     * @return Items
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param Items $items
     */
    public function setItems(Items $items)
    {
        $this->items = $items;
    }

    /**
     * @return string
     */
    public function getCollectionFormat()
    {
        return $this->collectionFormat;
    }

    /**
     * @param string $collectionFormat
     */
    public function setCollectionFormat($collectionFormat)
    {
        $this->collectionFormat = $collectionFormat;
    }

    /**
     * @return mixed
     */
    public function getDefault()
    {
        return $this->default;
    }

    /**
     * @param mixed $default
     */
    public function setDefault($default)
    {
        $this->default = $default;
    }

    /**
     * @return float
     */
    public function getMaximum()
    {
        return $this->maximum;
    }

    /**
     * @param float $maximum
     */
    public function setMaximum($maximum)
    {
        $this->maximum = $maximum;
    }

    /**
     * @return boolean
     */
    public function getExclusiveMaximum()
    {
        return $this->exclusiveMaximum;
    }

    /**
     * @param boolean $exclusiveMaximum
     */
    public function setExclusiveMaximum($exclusiveMaximum)
    {
        $this->exclusiveMaximum = $exclusiveMaximum;
    }

    /**
     * @return float
     */
    public function getMinimum()
    {
        return $this->minimum;
    }

    /**
     * @param float $minimum
     */
    public function setMinimum($minimum)
    {
        $this->minimum = $minimum;
    }


    /**
     * @return boolean
     */
    public function getExclusiveMinimum()
    {
        return $this->exclusiveMinimum;
    }

    /**
     * @param boolean $exclusiveMinimum
     */
    public function setExclusiveMinimum($exclusiveMinimum)
    {
        $this->exclusiveMinimum = $exclusiveMinimum;
    }

    /**
     * @return integer
     */
    public function getMaxLength()
    {
        return $this->maxLength;
    }

    /**
     * @param integer $maxLength
     */
    public function setMaxLength($maxLength)
    {
        $this->maxLength = $maxLength;
    }

    /**
     * @return integer
     */
    public function getMinLength()
    {
        return $this->minLength;
    }

    /**
     * @param integer $minLength
     */
    public function setMinLength($minLength)
    {
        $this->minLength = $minLength;
    }

    /**
     * @return string
     */
    public function getPattern()
    {
        return $this->pattern;
    }

    /**
     * @param string $pattern
     */
    public function setPattern($pattern)
    {
        $this->pattern = $pattern;
    }

    /**
     * @return integer
     */
    public function getMaxItems()
    {
        return $this->maxItems;
    }

    /**
     * @param integer $maxItems
     */
    public function setMaxItems($maxItems)
    {
        $this->maxItems = $maxItems;
    }

    /**
     * @return integer
     */
    public function getMinItems()
    {
        return $this->minItems;
    }

    /**
     * @param integer $minItems
     */
    public function setMinItems($minItems)
    {
        $this->minItems = $minItems;
    }

    /**
     * @return boolean
     */
    public function getUniqueItems()
    {
        return $this->uniqueItems;
    }

    /**
     * @param boolean $uniqueItems
     */
    public function setUniqueItems($uniqueItems)
    {
        $this->uniqueItems = $uniqueItems;
    }
    
    /**
     * @return array
     */
    public function getEnum()
    {
        return $this->enum;
    }

    /**
     * @param array $enum
     */
    public function setEnum(array $enum)
    {
        $this->enum = $enum;
    }

    /**
     * @return float
     */
    public function getMultipleOf()
    {
        return $this->multipleOf;
    }

    /**
     * @param float $multipleOf
     */
    public function setMultipleOf($multipleOf)
    {
        $this->multipleOf = $multipleOf;
    }
}
