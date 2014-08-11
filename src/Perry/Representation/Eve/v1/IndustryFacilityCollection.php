<?php
namespace Perry\Representation\Eve\v1;

use \Perry\Representation\Reference as Reference;
use \Perry\Representation\Uri as Uri;
use \Perry\Representation\Base as Base;

class IndustryFacilityCollection extends Base
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
        $converters['facilityID'] = function ($value) { return $value; };
        $converters['solarSystem'] = function ($value) { return $value; };
        $converters['name'] = function ($value) { return $value; };
        $converters['region'] = function ($value) { return $value; };
        $converters['tax'] = function ($value) { return $value; };
        $converters['owner'] = function ($value) { return $value; };
        $converters['type'] = function ($value) { return $value; };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['facilityID'] = isset($value->{'facilityID'}) ? $converters['facilityID']($value->{'facilityID'}) : null;
            $return['solarSystem'] = isset($value->{'solarSystem'}) ? $converters['solarSystem']($value->{'solarSystem'}) : null;
            $return['name'] = isset($value->{'name'}) ? $converters['name']($value->{'name'}) : null;
            $return['region'] = isset($value->{'region'}) ? $converters['region']($value->{'region'}) : null;
            $return['tax'] = isset($value->{'tax'}) ? $converters['tax']($value->{'tax'}) : null;
            $return['owner'] = isset($value->{'owner'}) ? $converters['owner']($value->{'owner'}) : null;
            $return['type'] = isset($value->{'type'}) ? $converters['type']($value->{'type'}) : null;
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
