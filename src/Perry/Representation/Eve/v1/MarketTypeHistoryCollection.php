<?php
namespace Perry\Representation\Eve\v1;

use \Perry\Representation\Reference as Reference;
use \Perry\Representation\Base as Base;

class MarketTypeHistoryCollection extends Base
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
        $converters['orderCount'] = function ($value) { return $value; };
        $converters['lowPrice'] = function ($value) { return $value; };
        $converters['highPrice'] = function ($value) { return $value; };
        $converters['avgPrice'] = function ($value) { return $value; };
        $converters['volume'] = function ($value) { return $value; };
        $converters['date'] = function ($value) { return $value; };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['orderCount'] = isset($value->{'orderCount'}) ? $converters['orderCount']($value->{'orderCount'}) : null;
            $return['lowPrice'] = isset($value->{'lowPrice'}) ? $converters['lowPrice']($value->{'lowPrice'}) : null;
            $return['highPrice'] = isset($value->{'highPrice'}) ? $converters['highPrice']($value->{'highPrice'}) : null;
            $return['avgPrice'] = isset($value->{'avgPrice'}) ? $converters['avgPrice']($value->{'avgPrice'}) : null;
            $return['volume'] = isset($value->{'volume'}) ? $converters['volume']($value->{'volume'}) : null;
            $return['date'] = isset($value->{'date'}) ? $converters['date']($value->{'date'}) : null;
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
