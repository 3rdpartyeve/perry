<?php
namespace Perry\Representation\Eve\v1;

use \Perry\Representation\Reference as Reference;
use \Perry\Representation\Base as Base;

class Planet extends Base
{
    public $position;

    public $type;

    public $system;

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
    public function setType($type)
    {
        $this->type = new Reference($type);
    }

    // by Warringer\Types\Reference
    public function setSystem($system)
    {
        $this->system = new Reference($system);
    }

    // by Warringer\Types\String
    public function setName($name)
    {
        $this->name = $name;
    }

}
