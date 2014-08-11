<?php
namespace Perry\Representation\Eve\v1;

use \Perry\Representation\Reference as Reference;
use \Perry\Representation\Uri as Uri;
use \Perry\Representation\Base as Base;

class System extends Base
{
    public $stats;

    public $name;

    public $securityStatus;

    public $securityClass;

    public $href;

    public $planets = [];

    public $position;

    public $sovereignty;

    public $constellation;

    // by Warringer\Types\Reference
    public function setStats($stats)
    {
        $this->stats = new Reference($stats);
    }

    // by Warringer\Types\String
    public function setName($name)
    {
        $this->name = $name;
    }

    // by Warringer\Types\Base
    public function setSecurityStatus($securityStatus)
    {
        $this->securityStatus = $securityStatus;
    }

    // by Warringer\Types\String
    public function setSecurityClass($securityClass)
    {
        $this->securityClass = $securityClass;
    }

    // by Warringer\Types\Uri
    public function setHref($href)
    {
        $this->href = new Uri($href);
    }

    // by Warringer\Types\ArrayType
    public function setPlanets($planets)
    {
        // by Warringer\Types\Dict
        $converters = [];
        $converters['href'] = function ($value) { return new Uri($value); };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['href'] = isset($value->{'href'}) ? $converters['href']($value->{'href'}) : null;
            return $return;
        };

        foreach ($planets as $key => $value) {
            $this->planets[$key] = $func($value);
        }
    }

    // by Warringer\Types\Dict
    public function setPosition($position)
    {
        // by Warringer\Types\Dict
        $converters = [];
        $converters['y'] = function ($value) { return $value; };
        $converters['x'] = function ($value) { return $value; };
        $converters['z'] = function ($value) { return $value; };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['y'] = isset($value->{'y'}) ? $converters['y']($value->{'y'}) : null;
            $return['x'] = isset($value->{'x'}) ? $converters['x']($value->{'x'}) : null;
            $return['z'] = isset($value->{'z'}) ? $converters['z']($value->{'z'}) : null;
            return $return;
        };
        $this->position = $func($position);
    }

    // by Warringer\Types\Reference
    public function setSovereignty($sovereignty)
    {
        $this->sovereignty = new Reference($sovereignty);
    }

    // by Warringer\Types\Reference
    public function setConstellation($constellation)
    {
        $this->constellation = new Reference($constellation);
    }

}
