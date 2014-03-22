<?php
namespace Perry\Representation\Eve\v1;

use \Perry\Representation\Reference as Reference;
use \Perry\Representation\Base as Base;

class Constellation extends Base
{
    public $position;

    public $region;

    public $systems = [];

    public $name;

    // by Warringer\Types\Dict
    public function setPosition($position)
    {
        // by Warringer\Types\Dict
        $converters = [];
        $converters['y'] = function($value) { return $value; };
        $converters['x'] = function($value) { return $value; };
        $converters['z'] = function($value) { return $value; };

        $func = function($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['y'] = isset($value->{'y'}) ? $converters['y']($value->{'y'}) : null;
            $return['x'] = isset($value->{'x'}) ? $converters['x']($value->{'x'}) : null;
            $return['z'] = isset($value->{'z'}) ? $converters['z']($value->{'z'}) : null;
            return $return;
        };
        $this->position = $func($position);
    }

    // by Warringer\Types\Reference
    public function setRegion($region)
    {
        $this->region = new Reference($region);
    }

    // by Warringer\Types\ArrayType
    public function setSystems($systems)
    {
        // by Warringer\Types\Dict
        $converters = [];
        $converters['href'] = function($value) { return $value; };

        $func = function($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['href'] = isset($value->{'href'}) ? $converters['href']($value->{'href'}) : null;
            return $return;
        };

        foreach ($systems as $key => $value) {
            $this->systems[$key] = $func($value);
        }
    }

    // by Warringer\Types\String
    public function setName($name)
    {
        $this->name = $name;
    }

}
