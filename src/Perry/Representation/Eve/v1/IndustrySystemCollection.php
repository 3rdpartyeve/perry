<?php
namespace Perry\Representation\Eve\v1;

use \Perry\Representation\Reference as Reference;
use \Perry\Representation\Uri as Uri;
use \Perry\Representation\Base as Base;

class IndustrySystemCollection extends Base
{
    public $pageCount;

    public $items = [];

    public $totalCount;

    public $next;

    public $previous;

    // by Warringer\Types\Long
    public function setPageCount($pageCount)
    {
        $this->pageCount = $pageCount;
    }

    // by Warringer\Types\ArrayType
    public function setItems($items)
    {
        // by Warringer\Types\Base
        $converters = [];
        $converters['systemCostIndices'] = function ($values) {
        // by Warringer\Types\Dict
        $converters = [];
        $converters['costIndex'] = function ($value) { return $value; };
        $converters['activityID'] = function ($value) { return $value; };
        $converters['activityName'] = function ($value) { return $value; };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['costIndex'] = isset($value->{'costIndex'}) ? $converters['costIndex']($value->{'costIndex'}) : null;
            $return['activityID'] = isset($value->{'activityID'}) ? $converters['activityID']($value->{'activityID'}) : null;
            $return['activityName'] = isset($value->{'activityName'}) ? $converters['activityName']($value->{'activityName'}) : null;
            return $return;
        };

            foreach ($values as $key => $value) {
                 $values[$key] = $func($value);
            }
           return $values;
        };

        $converters['solarSystem'] = function ($value) { return new Reference($value); };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['systemCostIndices'] = isset($value->{'systemCostIndices'}) ? $converters['systemCostIndices']($value->{'systemCostIndices'}) : null;
            $return['solarSystem'] = isset($value->{'solarSystem'}) ? $converters['solarSystem']($value->{'solarSystem'}) : null;
            return $return;
        };

        foreach ($items as $key => $value) {
            $this->items[$key] = $func($value);
        }
    }

    // by Warringer\Types\Long
    public function setTotalCount($totalCount)
    {
        $this->totalCount = $totalCount;
    }

    // by Warringer\Types\Reference
    public function setNext($next)
    {
        $this->next = new Reference($next);
    }

    // by Warringer\Types\Reference
    public function setPrevious($previous)
    {
        $this->previous = new Reference($previous);
    }

}
