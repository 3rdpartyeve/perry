<?php
namespace Perry\Representation\Eve\v1;

use \Perry\Representation\Reference as Reference;
use \Perry\Representation\Uri as Uri;
use \Perry\Representation\Base as Base;

class SovStructureCollection extends Base
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
        $converters['alliance'] = function ($value) { return $value; };
        $converters['vulnerabilityOccupancyLevel'] = function ($value) { return $value; };
        $converters['structureID'] = function ($value) { return $value; };
        $converters['vulnerableStartTime'] = function ($value) { return $value; };
        $converters['solarSystem'] = function ($value) { return $value; };
        $converters['vulnerableEndTime'] = function ($value) { return $value; };
        $converters['type'] = function ($value) { return $value; };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['alliance'] = isset($value->{'alliance'}) ? $converters['alliance']($value->{'alliance'}) : null;
            $return['vulnerabilityOccupancyLevel'] = isset($value->{'vulnerabilityOccupancyLevel'}) ? $converters['vulnerabilityOccupancyLevel']($value->{'vulnerabilityOccupancyLevel'}) : null;
            $return['structureID'] = isset($value->{'structureID'}) ? $converters['structureID']($value->{'structureID'}) : null;
            $return['vulnerableStartTime'] = isset($value->{'vulnerableStartTime'}) ? $converters['vulnerableStartTime']($value->{'vulnerableStartTime'}) : null;
            $return['solarSystem'] = isset($value->{'solarSystem'}) ? $converters['solarSystem']($value->{'solarSystem'}) : null;
            $return['vulnerableEndTime'] = isset($value->{'vulnerableEndTime'}) ? $converters['vulnerableEndTime']($value->{'vulnerableEndTime'}) : null;
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
