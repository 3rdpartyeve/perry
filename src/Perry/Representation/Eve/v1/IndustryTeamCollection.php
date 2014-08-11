<?php
namespace Perry\Representation\Eve\v1;

use \Perry\Representation\Reference as Reference;
use \Perry\Representation\Uri as Uri;
use \Perry\Representation\Base as Base;

class IndustryTeamCollection extends Base
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
        $converters['solarSystem'] = function ($value) { return $value; };
        $converters['specialization'] = function ($value) { return $value; };
        $converters['creationTime'] = function ($value) { return $value; };
        $converters['workers'] = function ($values) {
        // by Warringer\Types\Dict
        $converters = [];
        $converters['bonus'] = function ($value) { return $value; };
        $converters['specialization'] = function ($value) { return $value; };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['bonus'] = isset($value->{'bonus'}) ? $converters['bonus']($value->{'bonus'}) : null;
            $return['specialization'] = isset($value->{'specialization'}) ? $converters['specialization']($value->{'specialization'}) : null;
            return $return;
        };

            foreach ($values as $key => $value) {
                 $values[$key] = $func($value);
            }
           return $values;
        };

        $converters['expiryTime'] = function ($value) { return $value; };
        $converters['solarSystemBids'] = function ($values) {
        // by Warringer\Types\Dict
        $converters = [];
        $converters['characterBids'] = function ($values) {
        // by Warringer\Types\Dict
        $converters = [];
        $converters['character'] = function ($value) { return $value; };
        $converters['bidAmount'] = function ($value) { return $value; };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['character'] = isset($value->{'character'}) ? $converters['character']($value->{'character'}) : null;
            $return['bidAmount'] = isset($value->{'bidAmount'}) ? $converters['bidAmount']($value->{'bidAmount'}) : null;
            return $return;
        };

            foreach ($values as $key => $value) {
                 $values[$key] = $func($value);
            }
           return $values;
        };

        $converters['solarSystem'] = function ($value) { return $value; };
        $converters['bidAmount'] = function ($value) { return $value; };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['characterBids'] = isset($value->{'characterBids'}) ? $converters['characterBids']($value->{'characterBids'}) : null;
            $return['solarSystem'] = isset($value->{'solarSystem'}) ? $converters['solarSystem']($value->{'solarSystem'}) : null;
            $return['bidAmount'] = isset($value->{'bidAmount'}) ? $converters['bidAmount']($value->{'bidAmount'}) : null;
            return $return;
        };

            foreach ($values as $key => $value) {
                 $values[$key] = $func($value);
            }
           return $values;
        };

        $converters['auctionExpiryTime'] = function ($value) { return $value; };
        $converters['activity'] = function ($value) { return $value; };
        $converters['costModifier'] = function ($value) { return $value; };
        $converters['id'] = function ($value) { return $value; };
        $converters['name'] = function ($value) { return $value; };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['solarSystem'] = isset($value->{'solarSystem'}) ? $converters['solarSystem']($value->{'solarSystem'}) : null;
            $return['specialization'] = isset($value->{'specialization'}) ? $converters['specialization']($value->{'specialization'}) : null;
            $return['creationTime'] = isset($value->{'creationTime'}) ? $converters['creationTime']($value->{'creationTime'}) : null;
            $return['workers'] = isset($value->{'workers'}) ? $converters['workers']($value->{'workers'}) : null;
            $return['expiryTime'] = isset($value->{'expiryTime'}) ? $converters['expiryTime']($value->{'expiryTime'}) : null;
            $return['solarSystemBids'] = isset($value->{'solarSystemBids'}) ? $converters['solarSystemBids']($value->{'solarSystemBids'}) : null;
            $return['auctionExpiryTime'] = isset($value->{'auctionExpiryTime'}) ? $converters['auctionExpiryTime']($value->{'auctionExpiryTime'}) : null;
            $return['activity'] = isset($value->{'activity'}) ? $converters['activity']($value->{'activity'}) : null;
            $return['costModifier'] = isset($value->{'costModifier'}) ? $converters['costModifier']($value->{'costModifier'}) : null;
            $return['id'] = isset($value->{'id'}) ? $converters['id']($value->{'id'}) : null;
            $return['name'] = isset($value->{'name'}) ? $converters['name']($value->{'name'}) : null;
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
