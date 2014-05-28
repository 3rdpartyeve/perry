<?php
namespace Perry\Representation\Eve\v1;

use \Perry\Representation\Reference as Reference;
use \Perry\Representation\Base as Base;

class War extends Base
{
    public $timeFinished;

    public $openForAllies;

    public $allies = [];

    public $timeStarted;

    public $allyCount;

    public $timeDeclared;

    public $aggressor;

    public $mutual;

    public $killmails;

    public $timeRetracted;

    public $defender;

    public $id;

    // by Warringer\Types\String
    public function setTimeFinished($timeFinished)
    {
        $this->timeFinished = $timeFinished;
    }

    // by Warringer\Types\Base
    public function setOpenForAllies($openForAllies)
    {
        $this->openForAllies = $openForAllies;
    }

    // by Warringer\Types\ArrayType
    public function setAllies($allies)
    {
        // by Warringer\Types\Dict
        $converters = [];
        $converters['href'] = function ($value) { return $value; };
        $converters['id'] = function ($value) { return $value; };
        $converters['name'] = function ($value) { return $value; };
        $converters['icon'] = function ($value) { return new Reference($value); };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['href'] = isset($value->{'href'}) ? $converters['href']($value->{'href'}) : null;
            $return['id'] = isset($value->{'id'}) ? $converters['id']($value->{'id'}) : null;
            $return['name'] = isset($value->{'name'}) ? $converters['name']($value->{'name'}) : null;
            $return['icon'] = isset($value->{'icon'}) ? $converters['icon']($value->{'icon'}) : null;
            return $return;
        };

        foreach ($allies as $key => $value) {
            $this->allies[$key] = $func($value);
        }
    }

    // by Warringer\Types\String
    public function setTimeStarted($timeStarted)
    {
        $this->timeStarted = $timeStarted;
    }

    // by Warringer\Types\Long
    public function setAllyCount($allyCount)
    {
        $this->allyCount = $allyCount;
    }

    // by Warringer\Types\String
    public function setTimeDeclared($timeDeclared)
    {
        $this->timeDeclared = $timeDeclared;
    }

    // by Warringer\Types\Dict
    public function setAggressor($aggressor)
    {
        // by Warringer\Types\Dict
        $converters = [];
        $converters['shipsKilled'] = function ($value) { return $value; };
        $converters['name'] = function ($value) { return $value; };
        $converters['href'] = function ($value) { return $value; };
        $converters['icon'] = function ($value) { return new Reference($value); };
        $converters['id'] = function ($value) { return $value; };
        $converters['iskKilled'] = function ($value) { return $value; };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['shipsKilled'] = isset($value->{'shipsKilled'}) ? $converters['shipsKilled']($value->{'shipsKilled'}) : null;
            $return['name'] = isset($value->{'name'}) ? $converters['name']($value->{'name'}) : null;
            $return['href'] = isset($value->{'href'}) ? $converters['href']($value->{'href'}) : null;
            $return['icon'] = isset($value->{'icon'}) ? $converters['icon']($value->{'icon'}) : null;
            $return['id'] = isset($value->{'id'}) ? $converters['id']($value->{'id'}) : null;
            $return['iskKilled'] = isset($value->{'iskKilled'}) ? $converters['iskKilled']($value->{'iskKilled'}) : null;
            return $return;
        };
        $this->aggressor = $func($aggressor);
    }

    // by Warringer\Types\Base
    public function setMutual($mutual)
    {
        $this->mutual = $mutual;
    }

    // by Warringer\Types\Base
    public function setKillmails($killmails)
    {
        $this->killmails = $killmails;
    }

    // by Warringer\Types\String
    public function setTimeRetracted($timeRetracted)
    {
        $this->timeRetracted = $timeRetracted;
    }

    // by Warringer\Types\Dict
    public function setDefender($defender)
    {
        // by Warringer\Types\Dict
        $converters = [];
        $converters['shipsKilled'] = function ($value) { return $value; };
        $converters['name'] = function ($value) { return $value; };
        $converters['href'] = function ($value) { return $value; };
        $converters['icon'] = function ($value) { return new Reference($value); };
        $converters['id'] = function ($value) { return $value; };
        $converters['iskKilled'] = function ($value) { return $value; };

        $func = function ($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['shipsKilled'] = isset($value->{'shipsKilled'}) ? $converters['shipsKilled']($value->{'shipsKilled'}) : null;
            $return['name'] = isset($value->{'name'}) ? $converters['name']($value->{'name'}) : null;
            $return['href'] = isset($value->{'href'}) ? $converters['href']($value->{'href'}) : null;
            $return['icon'] = isset($value->{'icon'}) ? $converters['icon']($value->{'icon'}) : null;
            $return['id'] = isset($value->{'id'}) ? $converters['id']($value->{'id'}) : null;
            $return['iskKilled'] = isset($value->{'iskKilled'}) ? $converters['iskKilled']($value->{'iskKilled'}) : null;
            return $return;
        };
        $this->defender = $func($defender);
    }

    // by Warringer\Types\Long
    public function setId($id)
    {
        $this->id = $id;
    }

}
