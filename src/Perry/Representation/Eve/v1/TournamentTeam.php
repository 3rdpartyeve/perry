<?php
namespace Perry\Representation\Eve\v1;

use \Perry\Representation\Reference as Reference;
use \Perry\Representation\Base as Base;

class TournamentTeam extends Base
{
    public $banFrequencyAgainst = [];

    public $shipsKilled;

    public $pilots = [];

    public $matches = [];

    public $flagshipType;

    public $name;

    public $seed;

    public $banFrequency = [];

    public $members;

    public $captain;

    public $iskKilled;

    // by Warringer\Types\ArrayType
    public function setBanFrequencyAgainst($banFrequencyAgainst)
    {
        // by Warringer\Types\Dict
        $converters = [];
        $converters['numBans'] = function($value) { return $value; };
        $converters['shipType'] = function($value) { return new Reference($value); };

        $func = function($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['numBans'] = isset($value->{'numBans'}) ? $converters['numBans']($value->{'numBans'}) : null;
            $return['shipType'] = isset($value->{'shipType'}) ? $converters['shipType']($value->{'shipType'}) : null;
            return $return;
        };

        foreach ($banFrequencyAgainst as $key => $value) {
            $this->banFrequencyAgainst[$key] = $func($value);
        }
    }

    // by Warringer\Types\Long
    public function setShipsKilled($shipsKilled)
    {
        $this->shipsKilled = $shipsKilled;
    }

    // by Warringer\Types\ArrayType
    public function setPilots($pilots)
    {
        // by Warringer\Types\Reference
        $func = function($value) { return new Reference($value); };

        foreach ($pilots as $key => $value) {
            $this->pilots[$key] = $func($value);
        }
    }

    // by Warringer\Types\ArrayType
    public function setMatches($matches)
    {
        // by Warringer\Types\Reference
        $func = function($value) { return new Reference($value); };

        foreach ($matches as $key => $value) {
            $this->matches[$key] = $func($value);
        }
    }

    // by Warringer\Types\Reference
    public function setFlagshipType($flagshipType)
    {
        $this->flagshipType = new Reference($flagshipType);
    }

    // by Warringer\Types\String
    public function setName($name)
    {
        $this->name = $name;
    }

    // by Warringer\Types\Long
    public function setSeed($seed)
    {
        $this->seed = $seed;
    }

    // by Warringer\Types\ArrayType
    public function setBanFrequency($banFrequency)
    {
        // by Warringer\Types\Dict
        $converters = [];
        $converters['numBans'] = function($value) { return $value; };
        $converters['shipType'] = function($value) { return new Reference($value); };

        $func = function($value) use($converters) {
            $return = new \ArrayObject($value, \ArrayObject::ARRAY_AS_PROPS);
            $return['numBans'] = isset($value->{'numBans'}) ? $converters['numBans']($value->{'numBans'}) : null;
            $return['shipType'] = isset($value->{'shipType'}) ? $converters['shipType']($value->{'shipType'}) : null;
            return $return;
        };

        foreach ($banFrequency as $key => $value) {
            $this->banFrequency[$key] = $func($value);
        }
    }

    // by Warringer\Types\Reference
    public function setMembers($members)
    {
        $this->members = new Reference($members);
    }

    // by Warringer\Types\Reference
    public function setCaptain($captain)
    {
        $this->captain = new Reference($captain);
    }

    // by Warringer\Types\Long
    public function setIskKilled($iskKilled)
    {
        $this->iskKilled = $iskKilled;
    }

}
