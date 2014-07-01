<?php
namespace Perry\Representation\Eve\v1;

use \Perry\Representation\Reference as Reference;
use \Perry\Representation\Uri as Uri;
use \Perry\Representation\Base as Base;

class BattleTheatreCollection extends Base
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
        $converters['queue'] = function ($value) { return $value; };
        $converters['help'] = function ($value) { return $value; };
        $converters['description'] = function ($value) { return $value; };
        $converters['regions'] = function ($values) {
        // by Warringer\Types\Reference
        $func = function ($value) { return new Reference($value); };

            foreach ($values as $key => $value) {
                 $values[$key] = $func($value);
            }
           return $values;
        };

        $converters['key'] = function ($value) { return $value; };
        $converters['icon'] = function ($value) { return new Reference($value); };
        $converters['name'] = function ($value) { return $value; };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['queue'] = isset($value->{'queue'}) ? $converters['queue']($value->{'queue'}) : null;
            $return['help'] = isset($value->{'help'}) ? $converters['help']($value->{'help'}) : null;
            $return['description'] = isset($value->{'description'}) ? $converters['description']($value->{'description'}) : null;
            $return['regions'] = isset($value->{'regions'}) ? $converters['regions']($value->{'regions'}) : null;
            $return['key'] = isset($value->{'key'}) ? $converters['key']($value->{'key'}) : null;
            $return['icon'] = isset($value->{'icon'}) ? $converters['icon']($value->{'icon'}) : null;
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
