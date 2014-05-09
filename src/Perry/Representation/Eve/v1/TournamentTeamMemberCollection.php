<?php
namespace Perry\Representation\Eve\v1;

use \Perry\Representation\Reference as Reference;
use \Perry\Representation\Base as Base;

class TournamentTeamMemberCollection extends Base
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
        $converters['alliance'] = function ($value) { return new Reference($value); };
        $converters['name'] = function ($value) { return $value; };
        $converters['corporation'] = function ($value) { return new Reference($value); };
        $converters['self'] = function ($value) { return new Reference($value); };
        $converters['character'] = function ($value) { return new Reference($value); };
        $converters['icon'] = function ($value) { return new Reference($value); };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['alliance'] = isset($value->{'alliance'}) ? $converters['alliance']($value->{'alliance'}) : null;
            $return['name'] = isset($value->{'name'}) ? $converters['name']($value->{'name'}) : null;
            $return['corporation'] = isset($value->{'corporation'}) ? $converters['corporation']($value->{'corporation'}) : null;
            $return['self'] = isset($value->{'self'}) ? $converters['self']($value->{'self'}) : null;
            $return['character'] = isset($value->{'character'}) ? $converters['character']($value->{'character'}) : null;
            $return['icon'] = isset($value->{'icon'}) ? $converters['icon']($value->{'icon'}) : null;
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
