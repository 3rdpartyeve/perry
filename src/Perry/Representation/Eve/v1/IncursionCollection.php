<?php
namespace Perry\Representation\Eve\v1;

use \Perry\Representation\Reference as Reference;
use \Perry\Representation\Base as Base;

class IncursionCollection extends Base
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
        $converters['influence'] = function ($value) { return $value; };
        $converters['hasBoss'] = function ($value) { return $value; };
        $converters['state'] = function ($value) { return $value; };
        $converters['stagingSolarSystem'] = function ($value) { return new Reference($value); };
        $converters['constellation'] = function ($value) { return new Reference($value); };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['influence'] = isset($value->{'influence'}) ? $converters['influence']($value->{'influence'}) : null;
            $return['hasBoss'] = isset($value->{'hasBoss'}) ? $converters['hasBoss']($value->{'hasBoss'}) : null;
            $return['state'] = isset($value->{'state'}) ? $converters['state']($value->{'state'}) : null;
            $return['stagingSolarSystem'] = isset($value->{'stagingSolarSystem'}) ? $converters['stagingSolarSystem']($value->{'stagingSolarSystem'}) : null;
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
