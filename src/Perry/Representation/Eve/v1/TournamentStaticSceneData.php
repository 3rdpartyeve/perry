<?php
namespace Perry\Representation\Eve\v1;

use \Perry\Representation\Reference as Reference;
use \Perry\Representation\Base as Base;

class TournamentStaticSceneData extends Base
{
    public $globalObjects = [];

    public $ships = [];

    public $nebulaName;

    // by Warringer\Types\ArrayType
    public function setGlobalObjects($globalObjects)
    {
        // by Warringer\Types\Dict
        $converters = [];
        $converters['name'] = function ($value) { return $value; };
        $converters['planetOrMoonInfo'] = function ($value) { return $value; };
        $converters['y'] = function ($value) { return $value; };
        $converters['x'] = function ($value) { return $value; };
        $converters['z'] = function ($value) { return $value; };
        $converters['type'] = function ($value) { return new Reference($value); };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['name'] = isset($value->{'name'}) ? $converters['name']($value->{'name'}) : null;
            $return['planetOrMoonInfo'] = isset($value->{'planetOrMoonInfo'}) ? $converters['planetOrMoonInfo']($value->{'planetOrMoonInfo'}) : null;
            $return['y'] = isset($value->{'y'}) ? $converters['y']($value->{'y'}) : null;
            $return['x'] = isset($value->{'x'}) ? $converters['x']($value->{'x'}) : null;
            $return['z'] = isset($value->{'z'}) ? $converters['z']($value->{'z'}) : null;
            $return['type'] = isset($value->{'type'}) ? $converters['type']($value->{'type'}) : null;
            return $return;
        };

        foreach ($globalObjects as $key => $value) {
            $this->globalObjects[$key] = $func($value);
        }
    }

    // by Warringer\Types\ArrayType
    public function setShips($ships)
    {
        // by Warringer\Types\Dict
        $converters = [];
        $converters['item'] = function ($value) { return new Reference($value); };
        $converters['points'] = function ($value) { return $value; };
        $converters['character'] = function ($value) { return new Reference($value); };
        $converters['turrets'] = function ($values) {
        // by Warringer\Types\Reference
        $func = function ($value) { return new Reference($value); };

            foreach ($values as $key => $value) {
                 $values[$key] = $func($value);
            }
           return $values;
        };

        $converters['type'] = function ($value) { return new Reference($value); };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['item'] = isset($value->{'item'}) ? $converters['item']($value->{'item'}) : null;
            $return['points'] = isset($value->{'points'}) ? $converters['points']($value->{'points'}) : null;
            $return['character'] = isset($value->{'character'}) ? $converters['character']($value->{'character'}) : null;
            $return['turrets'] = isset($value->{'turrets'}) ? $converters['turrets']($value->{'turrets'}) : null;
            $return['type'] = isset($value->{'type'}) ? $converters['type']($value->{'type'}) : null;
            return $return;
        };

        foreach ($ships as $key => $value) {
            $this->ships[$key] = $func($value);
        }
    }

    // by Warringer\Types\String
    public function setNebulaName($nebulaName)
    {
        $this->nebulaName = $nebulaName;
    }

}
