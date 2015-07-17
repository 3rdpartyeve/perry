<?php
namespace Perry\Representation\Eve\v1;

use \Perry\Representation\Reference as Reference;
use \Perry\Representation\Uri as Uri;
use \Perry\Representation\Base as Base;

class SovCampaignsCollection extends Base
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
        $converters['campaignID'] = function ($value) { return $value; };
        $converters['eventType'] = function ($value) { return $value; };
        $converters['sourceSolarsystem'] = function ($value) { return $value; };
        $converters['attackers'] = function ($value) { return $value; };
        $converters['sourceItemID'] = function ($value) { return $value; };
        $converters['startTime'] = function ($value) { return $value; };
        $converters['scores'] = function ($values) {
        // by Warringer\Types\Dict
        $converters = [];
        $converters['score'] = function ($value) { return $value; };
        $converters['team'] = function ($value) { return $value; };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['score'] = isset($value->{'score'}) ? $converters['score']($value->{'score'}) : null;
            $return['team'] = isset($value->{'team'}) ? $converters['team']($value->{'team'}) : null;
            return $return;
        };

            foreach ($values as $key => $value) {
                 $values[$key] = $func($value);
            }
           return $values;
        };

        $converters['defender'] = function ($value) { return $value; };
        $converters['constellation'] = function ($value) { return $value; };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['campaignID'] = isset($value->{'campaignID'}) ? $converters['campaignID']($value->{'campaignID'}) : null;
            $return['eventType'] = isset($value->{'eventType'}) ? $converters['eventType']($value->{'eventType'}) : null;
            $return['sourceSolarsystem'] = isset($value->{'sourceSolarsystem'}) ? $converters['sourceSolarsystem']($value->{'sourceSolarsystem'}) : null;
            $return['attackers'] = isset($value->{'attackers'}) ? $converters['attackers']($value->{'attackers'}) : null;
            $return['sourceItemID'] = isset($value->{'sourceItemID'}) ? $converters['sourceItemID']($value->{'sourceItemID'}) : null;
            $return['startTime'] = isset($value->{'startTime'}) ? $converters['startTime']($value->{'startTime'}) : null;
            $return['scores'] = isset($value->{'scores'}) ? $converters['scores']($value->{'scores'}) : null;
            $return['defender'] = isset($value->{'defender'}) ? $converters['defender']($value->{'defender'}) : null;
            $return['constellation'] = isset($value->{'constellation'}) ? $converters['constellation']($value->{'constellation'}) : null;
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
