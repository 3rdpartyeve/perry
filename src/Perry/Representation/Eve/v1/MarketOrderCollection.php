<?php
namespace Perry\Representation\Eve\v1;

use \Perry\Representation\Reference as Reference;
use \Perry\Representation\Uri as Uri;
use \Perry\Representation\Base as Base;

class MarketOrderCollection extends Base
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
        $converters['buy'] = function ($value) { return $value; };
        $converters['issued'] = function ($value) { return $value; };
        $converters['price'] = function ($value) { return $value; };
        $converters['volumeEntered'] = function ($value) { return $value; };
        $converters['minVolume'] = function ($value) { return $value; };
        $converters['volume'] = function ($value) { return $value; };
        $converters['item'] = function ($value) { return new Reference($value); };
        $converters['range'] = function ($value) { return $value; };
        $converters['href'] = function ($value) { return new Uri($value); };
        $converters['location'] = function ($value) { return new Reference($value); };
        $converters['duration'] = function ($value) { return $value; };
        $converters['type'] = function ($value) { return new Reference($value); };
        $converters['id'] = function ($value) { return $value; };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['buy'] = isset($value->{'buy'}) ? $converters['buy']($value->{'buy'}) : null;
            $return['issued'] = isset($value->{'issued'}) ? $converters['issued']($value->{'issued'}) : null;
            $return['price'] = isset($value->{'price'}) ? $converters['price']($value->{'price'}) : null;
            $return['volumeEntered'] = isset($value->{'volumeEntered'}) ? $converters['volumeEntered']($value->{'volumeEntered'}) : null;
            $return['minVolume'] = isset($value->{'minVolume'}) ? $converters['minVolume']($value->{'minVolume'}) : null;
            $return['volume'] = isset($value->{'volume'}) ? $converters['volume']($value->{'volume'}) : null;
            $return['item'] = isset($value->{'item'}) ? $converters['item']($value->{'item'}) : null;
            $return['range'] = isset($value->{'range'}) ? $converters['range']($value->{'range'}) : null;
            $return['href'] = isset($value->{'href'}) ? $converters['href']($value->{'href'}) : null;
            $return['location'] = isset($value->{'location'}) ? $converters['location']($value->{'location'}) : null;
            $return['duration'] = isset($value->{'duration'}) ? $converters['duration']($value->{'duration'}) : null;
            $return['type'] = isset($value->{'type'}) ? $converters['type']($value->{'type'}) : null;
            $return['id'] = isset($value->{'id'}) ? $converters['id']($value->{'id'}) : null;
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
