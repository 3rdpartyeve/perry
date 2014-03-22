<?php
namespace Perry\Representation\Eve\v1;

use \Perry\Representation\Reference as Reference;
use \Perry\Representation\Base as Base;

class Region extends Base
{
    public $description;

    public $marketBuyOrders;

    public $name;

    public $constellations = [];

    public $marketSellOrders;

    // by Warringer\Types\String
    public function setDescription($description)
    {
        $this->description = $description;
    }

    // by Warringer\Types\Reference
    public function setMarketBuyOrders($marketBuyOrders)
    {
        $this->marketBuyOrders = new Reference($marketBuyOrders);
    }

    // by Warringer\Types\String
    public function setName($name)
    {
        $this->name = $name;
    }

    // by Warringer\Types\ArrayType
    public function setConstellations($constellations)
    {
        // by Warringer\Types\Dict
        $converters = [];
        $converters['href'] = function($value) { return $value; };

        $func = function($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['href'] = isset($value->{'href'}) ? $converters['href']($value->{'href'}) : null;
            return $return;
        };

        foreach ($constellations as $key => $value) {
            $this->constellations[$key] = $func($value);
        }
    }

    // by Warringer\Types\Reference
    public function setMarketSellOrders($marketSellOrders)
    {
        $this->marketSellOrders = new Reference($marketSellOrders);
    }

}
